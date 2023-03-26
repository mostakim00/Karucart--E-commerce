<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereBetween('role_id', [1, 3])->with('role')->get()->except(1);
        return view('backend.pages.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users|min:10|max:13',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('message', 'User Added Successfully');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'newpassword' => 'required|confirmed|min:8',
        ]);

        User::where('id', $request->user_id)->update([
            'password' => Hash::make($request->newpassword),
        ]);
        return redirect()->back()->with('message', 'User Password Changed');
    }
}
