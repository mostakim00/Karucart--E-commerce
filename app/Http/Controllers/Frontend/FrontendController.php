<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\ProductGallery;
use App\Models\Backend\Category;
use App\Models\Backend\SubCategory;
use App\Models\Backend\Slider;
use Illuminate\Http\Request;
use App\Models\Frontend\Subscribe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->where('status','1')->limit(6)->get();
        $productlatest = Product::latest()->where('status','1')->limit(4)->get();
        $categorys = Category::where('status', 1)->get();
        $sliderDetailes = Slider::where('status', 1)->get();
        return view('frontend.pages.home', compact('products', 'productlatest', 'categorys', 'sliderDetailes'));
    }
    
    public function ContactPage(){
        return view('frontend.pages.contact');
    }
    public function AboutUsPage(){
        return view('frontend.pages.aboutus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productdetails($prodetailsslug)
    {
        $data = array();
        $data['product'] = Product::where('product_slug', $prodetailsslug)->first();
        if ($data['product'] != null) {
            $data['progallery'] = ProductGallery::where('product_code', $data['product']->product_code)->get();
            $data['relatedproduct'] = Product::where('cat_id', $data['product']->cat_id)->get();
        } else {
            return back();
        }
        return view('frontend.pages.product.single', $data);
    }

    //==========newslatter store=======================
    public function newslatterstore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required |email',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'faild',
                'errors' => $validator->messages(),
            ]);
        } else {
            $newslatter = new Subscribe;
            $newslatter->email = $request->email;
            $newslatter->save();
            return response()->json([
                'message' => 'Thanks for staying with us',
            ]);
        }
    }
    //============search product==============================
    public function searchProduct(Request $request)
    {
        //search when category all selected
        if ($request->category == 'allCat') {
            $products = Product::orderBy('id', 'DESC')->where('status', 1)->where('product_name', 'LIKE', '%' . $request->product . '%')->get();
            $subcategorys = SubCategory::orderBy('id', 'DESC')->where('sub_status', 1)->get();
        }
        //search when category spacfic selected
        else if ($request->category != 'allCat') {
            $products = Product::orderBy('id', 'DESC')->where('status', 1)->where('cat_id', $request->category)->where('product_name', 'LIKE', '%' . $request->product . '%')->get();
            $subcategorys = SubCategory::where('category_id', $request->category)->where('sub_status', 1)->get();
        }
        return view('frontend.pages.product.searchProduct', compact('products', 'subcategorys'));
    }


    //=========--shope route--|| category wise product show=======

    public function categoryWiseProduct($id)
    {
        $categoryName = Category::find($id);
        if ($categoryName != null) {
            $products = Product::where('cat_id', $id)->where('status', 1)->orderBy('id', 'DESC')->paginate(9);
            $totalproductsCount = Product::where('cat_id', $id)->where('status', 1)->orderBy('id', 'DESC')->count();
            $subcategorys = SubCategory::where('category_id', $id)->where('sub_status', 1)->get();
            if ($products) {
                return view('frontend.pages.product.shop', compact('products', 'categoryName', 'subcategorys', 'totalproductsCount'));
            } else {
                return redirect()->back();
            }
        } else {
            return back();
        }
    }

    public  function account()
    {
        return view('frontend.pages.user.account');
    }
    //    User Logout Methord
    public function userLogout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login')->with('message', 'Successfully Logout');
        } else {
            return redirect()->back()->with('error', 'Your Are Not Login');
        }
    }
}
