<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Backend\Coupon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons= Coupon::orderby('id','asc')->get();
        return view('backend.pages.coupon.managecoupon', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.coupon.addcoupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = Carbon::now();
        $request->validate([
            'coupon_code'=>'required|unique:coupons',
            'discount_amount'=>'required|numeric',
            'vendor_id'=>'required',
            'start_at'=>'required|after:' . $today,
            'end_at'=>'required|after:' . $request->start_at,
            'status'=>'required'
        ]);
        $coupon= new Coupon();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->discount_amount = $request->discount_amount;
        $coupon->vendor_id = $request->vendor_id;
        $coupon->start_at = $request->start_at;
        $coupon->end_at =  $request->end_at;
        $coupon->status = $request->status;
        $coupon->save();
        return redirect()->route('admin.coupon.manage');
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
        $coupon= Coupon::find($id);
        return view('backend.pages.coupon.editcoupon', compact('coupon'));
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
        $request->validate([
            'discount_amount'=>'required|numeric',
            'start_at'=>'required',
            'end_at'=>'required|after:' . $request->start_at,
            'status'=>'required'
        ]);
        $coupon =Coupon::find($id);
        $coupon->coupon_code = $request->coupon_code;
        $coupon->discount_amount = $request->discount_amount;
        $coupon->vendor_id = $request->vendor_id;
        $coupon->start_at = date('Y-m-d H:i:s' , strtotime($request->start_at));
        $coupon->end_at = date('Y-m-d H:i:s' , strtotime($request->end_at));
        $coupon->status = $request->status;
        $coupon->update();
        return redirect()->route('admin.coupon.manage')->with('message','Data added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon=Coupon::find($id);
        $coupon->delete();
        return redirect()->route('admin.coupon.manage')->with('error','Data Deleted');
    }
}
