<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\User;
use App\Models\VendorMessage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

class VendormessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product_id = $request->product_id;
        $vendor_id = $request->vendor_id;
        $vendor = User::find($vendor_id);
        return view('vendorMessage.frontMessage', compact('product_id', 'vendor_id', 'vendor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'errors' => $validator->messages(),
            ]);
        } else {
            $vendorMessage = new VendorMessage();
            $vendorMessage->user_id = $request->user_id;
            $vendorMessage->product_id = $request->product_id;
            $vendorMessage->vendor_id = $request->vendor_id;
            $vendorMessage->message = $request->message;
            $vendorMessage->status = $request->status;
            $vendorMessage->created_at = Carbon::now();
            $vendorMessage->save();
            return response()->json([
                'message' => 'thanks for your message will get back to you shortly'
            ]);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function showuser($id)
    {
        $product = Product::all();
        $data = VendorMessage::where('user_id', Auth::user()->id)->where('product_id', $id)->get();
        $user_name = Auth::user()->name;

        return response()->json([
            'data' => $data,
            'user_name' => $user_name
        ]);
    }
    
    public function allMessage()
    {
        $user_id = Auth::user()->id;
        $users = VendorMessage::groupBy('user_id')->select('user_id', DB::raw('count(*) as total'))->where('vendor_id', $user_id)->get();
        $vendors = VendorMessage::where('user_id', $user_id)->get();
        return view('vendorMessage.backMessage', compact('users', 'vendors'));
    }
    
    public function showsidebarMessage()
    {
        $user_id = Auth::user()->id;
        $users = VendorMessage::where('vendor_id', $user_id)->get();
        return response()->json([
            'users' => $users
        ]);
    }
    
    public function userMessages($id)
    {
        $user_name = VendorMessage::with('vendor')->where('id', $id)->get();
        $usersMessage = VendorMessage::where('user_id', $id)->where('vendor_id', Auth::user()->id)->get();
        $vendorsMessage = VendorMessage::where('user_id', $id)->where('user_id', Auth::user()->id)->get();
        return response()->json([
            'usersMessage' => $usersMessage,
            'user_name' => $user_name,
            'vendorsMessage' => $vendorsMessage
        ]);
    }
    
    public function vendorMessages($id)
    {
        $data = VendorMessage::where('user_id', $id)->where('vendor_id', Auth::user()->id)->get();
        $userid = Auth::user()->id;
        return response()->json([
            'data' => $data,
            'userid' => $userid
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
