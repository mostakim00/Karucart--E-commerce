<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Slider;
use App\Models\Backend\Product;
use Illuminate\Support\Str;
use Image;
use File;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderinfo = Slider::all();
        return view('backend.pages.slider.manage',compact('sliderinfo'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productdetailes= Product::select('id','cat_id','product_name','product_price','discount_price')->get();
        
        return view('backend.pages.slider.create',compact('productdetailes'));
    }

    public function productDetailesShow($id)
    {
        $productdetailes = Product::with('category')->find($id);

        return response()->json([
            'data' => $productdetailes     
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'product_name' => 'required',
            'product_category' => 'required',
            'product_price' => 'required',
            'image' => 'required',
            'product_disPrice' => 'required',
            'title' => 'required|min:10',
            'description' => 'required|min:10',
        ]);

        if($validation)
        {
            $slider = new Slider();
            $slider->product_name = $request->product_name;
            $slider->product_category = $request->product_category;
            $slider->product_price = $request->product_price;
            $slider->product_disPrice = $request->product_disPrice;
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->slug = Str::slug($request->product_name);
            $slider->status = $request->status;
            if($request->image)
            {
                $image = $request->file('image');
                $imageCustomName = rand().'.'.$image->getClientOriginalExtension();
                $location = public_path('backend/sliderImages/'.$imageCustomName);
                Image::make($image)->save($location);
                $slider->image=$imageCustomName;
            }
            // dd($slider);
            $slider->save();

            return redirect()->route('manageSlider');
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
        //
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
        $slider_update = Slider::find($id);

        $slider_update->title = $request->title;
        $slider_update->description = $request->description;
        $slider_update->product_price = $request->product_price;
        $slider_update->product_disPrice = $request->product_disPrice;
        
        if(!empty($request->image)){
            if(File::exists('backend/sliderImages'.$slider_update->image)){
                File::delete('backend/sliderImages'.$slider_update->image);
            }
           
            $image = $request->file('image');
            $imageCustomName = rand().'.'.$image->getClientOriginalExtension();
            $location = public_path('backend/sliderImages/'.$imageCustomName);
            Image::make($image)->save($location);
            $slider_update->image = $imageCustomName;
        }

        // $slider->slug = Str::slug($request->product_name);
        $slider_update->status = $request->status;
        $slider_update->update();

        return redirect()->route('manageSlider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_slider= Slider::find($id);

        if(File::exists('backend/sliderImages/'.$delete_slider->image)){
            File::delete('backend/sliderImages/'.$delete_slider->image);
        }
        $delete_slider->delete();
        return redirect()->route('manageSlider');
    }
}
