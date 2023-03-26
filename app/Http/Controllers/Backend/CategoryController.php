<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Category;
use Illuminate\Support\Str;
use Image;
use File;
use Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //manage category page view
        $categoryData= Category::latest()->paginate(7);
        $serial = $categoryData->currentPage() != 1 ? $categoryData->perPage()*($categoryData->currentPage()-1)+1:1;
        return view('backend.pages.category.category',compact('categoryData','serial')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagination( Request $request )
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //category data store and validations
        $validator=Validator::make($request->all(),[
            'category_name'=>'required',
            'category_des'=>'required',
            'category_img' => 'required|mimes:jpeg,png,jpg,gif',
            
        ]);
        //validation error
        if($validator->fails()){
            return response()->json([
                'status'=>'faild',
                'errors'=> $validator->messages(),
            ]);
        }
        //data store
        else{
            $category= new Category;
            $category->category_name = $request->category_name;
            $category->slug = Str::slug($request->category_name);
            $category->category_des = $request->category_des;
            $category->status = $request->status;
            if($request->category_img){
                $image = $request->file('category_img');
                $imageCustomeName = rand().'.'.$image->getClientOriginalExtension();
                $location =public_path('backend/img/'.$imageCustomeName);
                Image::make($image)->save($location);
                $category->image= $imageCustomeName;
             }
            $category->save();
            return response()->json([
                'message'=>'Category Save Successfully',
            ]);   
            
           

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //category show for update
        $category = Category::find($id);
        if($category){
            return response()->json([
                'status'=>'ok',
                'data'=>$category,
            ]);
        }
        else{
            return response()->json([
                'message'=>'Category not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //category data store and validations
            $validator=Validator::make($request->all(),[
                'category_update_name'=>'required',
                'category_update_des'=>'required',
                'category_update_img' => 'mimes:jpeg,png,jpg,gif',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'=>'faild',
                    'errors'=> $validator->messages(),
                ]);
            }
            //data update
            else{
                $category= Category::find($id);
                $category->category_name = $request->category_update_name;
                $category->slug = Str::slug($request->category_update_name);
                $category->category_des = $request->category_update_des;
                $category->status = $request->update_status;

                if(!empty($request->category_update_img)){
                    if(File::exists('backend/img/'.$category->image )){
                        File::delete('backend/img/'.$category->image);
                    }
                    $image = $request->file('category_update_img');
                    $imageCustomeName = rand().'.'.$image->getClientOriginalExtension();
                    $location =public_path('backend/img/'.$imageCustomeName);
                    Image::make($image)->save($location);
                    $category->image= $imageCustomeName;
                 }
                $category->update();
                return response()->json([
                    'message'=>'Category update Successfully',
                ]);   
                
               
    
            }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //category delete
        $category = Category::find($id);
        if($category){
            if(File::exists('backend/img/'.$category->image )){
                File::delete('backend/img/'.$category->image);
            }
            $category->delete();
            return response()->json([
                'status'=>'ok',
                'message'=>'Category Delete Successfully',
            ]);
        }
    }
}
