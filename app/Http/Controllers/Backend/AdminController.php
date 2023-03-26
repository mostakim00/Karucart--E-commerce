<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Models\Backend\SubCategory;
use App\Models\Backend\Slider;
use App\Models\Backend\Coupon;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data['product_approve']= Product::orderBy('id','desc')->get()->count();
        $data['category'] = Category::select('category_name','image')->limit(4)->get();
        $data['Product'] = Product::select('product_name','thumbnails')->limit(4)->get();
        $data['coupons'] = Coupon::select('coupon_code','discount_amount')->limit(4)->get();
        $data['user'] = User::whereIn('role_id',['2','3','4'])->get()->count();
        $data['producttable_approve'] = Product::where('status',1)->get()->count();
        $data['slider_total'] = Slider::where('status',1)->get()->count();
        $data['categorytotal'] = Category::where('status',1)->count();
        $data['pendingcategory'] = Category::where('status',0)->count();
        $data['couponTotal'] = Coupon::where('status',1)->count();
        $data['product_product']= Product::where('status',0)->get()->count();
        $data['subcategory_total']= SubCategory::where('sub_status',1)->get()->count();
        $data['subcategory_pending']= SubCategory::where('sub_status',0)->get()->count();
        return view('backend.dashboard',$data);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
}
