<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentStep(Request $request)
    {
        return $request->all();
        $request->validate([
            'ship_fullName' => 'required',
            'ship_email' => 'required|email',
            'ship_companyName' => 'required',
            'ship_phone' => 'required',
            'ship_country' => 'required',
            'ship_division' => 'required',
            'ship_address' => 'required',
            'payment_method' => 'required',
        ]);

        $data = array();
        $data['ship_fullName'] = $request->ship_fullName;
        $data['ship_email'] = $request->ship_email;
        $data['ship_companyName'] = $request->ship_companyName;
        $data['ship_phone'] = $request->ship_phone;
        $data['ship_country'] = $request->ship_country;
        $data['ship_division'] = $request->ship_division;
        $data['ship_address'] = $request->ship_address;

        if ($request->payment_methord == 'sslcommerz') {
            return view('frontend.pages.payment.sslcommerz', compact('data'));
        }
    }
}
