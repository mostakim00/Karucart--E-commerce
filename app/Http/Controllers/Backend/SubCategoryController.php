<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\SubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;
use File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('backend.pages.subcategory.manage', compact('subCategories','categories'));
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
            'sub_name'=>'required',
            'sub_image' => 'required|mimes:jpeg,png,jpg,gif',

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
            $subcategory= new SubCategory;
            $subcategory->sub_name = $request->sub_name;
            $subcategory->sub_slug = Str::slug($request->sub_name);
            $subcategory->sub_status = $request->subcat_status;
            $subcategory->category_id = $request->category_id;
                $image = $request->file('sub_image');
                $imageCustomeName = rand().'.'.$image->getClientOriginalExtension();
                $location =public_path('backend/uploads/subCategory/'.$imageCustomeName);
                Image::make($image)->save($location);
                $subcategory->sub_image= $imageCustomeName;
             }
            $subcategory->save();
            return response()->json([
                'message'=>'Sub-Category Save Successfully',
            ]);


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
        $subcategory = SubCategory::find($id);
        if($subcategory){
            return response()->json([
                'status'=>'ok',
                'data'=>$subcategory,
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
        //subcategory data store and validations
            $validator=Validator::make($request->all(),[
                'update_sub_name'=>'required',
                'updatesub_image' => 'mimes:jpeg,png,jpg,gif',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'=>'faild',
                    'errors'=> $validator->messages(),
                ]);
            }
            //data update
            else{
                $subcategory= SubCategory::find($id);
                $subcategory->sub_name = $request->update_sub_name;
                $subcategory->sub_slug = Str::slug($request->update_sub_name);
                $subcategory->sub_status = $request->update_subcat_status;

                if(!empty($request->updatesub_image)){
                    if(File::exists('backend/img/'.$subcategory->image )){
                        File::delete('backend/img/'.$subcategory->image);
                    }
                    $image = $request->file('updatesub_image');
                    $imageCustomeName = rand().'.'.$image->getClientOriginalExtension();
                    $location =public_path('backend/img/'.$imageCustomeName);
                    Image::make($image)->save($location);
                    $subcategory->image= $imageCustomeName;
                 }
                $subcategory->update();
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
        $subcategory = SubCategory::find($id);
        if($subcategory){
            if(File::exists('backend/uploads/subCategory/'.$subcategory->sub_image )){
                File::delete('backend/uploads/subCategory/'.$subcategory->sub_image);
            }
            $subcategory->delete();
            return response()->json([
                'status'=>'ok',
                'message'=>'Category Delete Successfully',
            ]);
        }
    }
}
