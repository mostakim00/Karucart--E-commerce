<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function index()
    {
        $customer = User::where('role_id', 4)->with('role')->get()->except(1);
        return view('backend.pages.customer.index', compact('customer'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users|min:10|max:12',
            'nid' => 'required|unique:users|min:10|max:12',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nid' => $request->nid,
            'role_id' => 4,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('message', 'Customer Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,id,' . $id . ',email',
            'phone' => 'required|unique:users,id,' . $id . ',phone',
            'nid' => 'required|unique:users,id,' . $id . ',nid',
        ]);

        $update = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nid' => $request->nid,

        ]);
        return redirect()->back()->with('message', 'Customer Update Successfully');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Customer Deleted Successfully');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'newpassword' => 'required|confirmed|min:8',
        ]);

        User::where('id', $request->user_id)->update([
            'password' => Hash::make($request->newpassword),
        ]);
        return redirect()->back()->with('message', 'Password Changed Successfully');
    }
}
