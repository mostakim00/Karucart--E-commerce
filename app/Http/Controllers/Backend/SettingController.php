<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $setting = Setting::first();
        return view('backend.pages.setting.setting', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->company_name = $request->company_name;
        $setting->company_phone = $request->company_phone;
        if ($request->pic) {
            if (File::exists('backend/logo/' . $setting->pic)) {
                File::delete('backend/logo/' . $setting->pic);
                $image = $request->file('pic');
                $imgCustomName = rand() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/logo/' . $imgCustomName);
                Image::make($image)->save($location);
                $setting->pic = $imgCustomName;
            }
        }
        $setting->youtube_link = $request->youtube_link;
        $setting->instagram_link = $request->instagram_link;
        $setting->twitter_link = $request->twitter_link;
        $setting->facebook_link = $request->facebook_link;
        $setting->linkedin_link = $request->linkedin_link;
        $setting->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileEdit()
    {

        $user = User::where('id', Auth::id())->first();
        return view('backend.pages.setting.profile', compact('user'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users,id,' . $id . ',phone',
            'nid' => 'required|unique:users,id,' . $id . ',nid',
        ]);
        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'nid' => $request->nid,
        ]);
        if ($user) {
            return redirect()->back()->with('message', 'Profile Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function profilePasswordUpdate(Request $request, $id)
    {
        $request->validate([
            'newpassword' => 'required|confirmed|min:8',
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::where('id', $id)->update([
                'password' => Hash::make($request->newpassword),
            ]);
            return redirect()->back()->with('message', 'Password Change Successfully');
        } else {
            return redirect()->back()->with('error', 'Current Password Not Matched');
        }
    }

    public function profilePaymentUpdate(Request $request, $id)
    {

        $user = User::where('id', $id)->update([
            'bkash' => $request->bkash,
            'rocket' => $request->rocket,
            'nagad' => $request->nagad,
        ]);

        if ($user) {
            return redirect()->back()->with('message', 'Payment Method Updated');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function profileImageUpdate(Request $request, $id)
    {

        // Image Upload
        if ($request->hasFile('photo')) {
            if ($request->old_photo) {
                unlink($request->old_photo);
            }
            $image = $request->file('photo');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('backend/user/' . $image_name);
            $data['photo'] = 'backend/user/' . $image_name;
        } else {
            $data['photo'] = $request->old_photo;
        }
        $user = User::where('id', $id)->update([
            'photo' => $data['photo']
        ]);

        if ($user) {
            return redirect()->back()->with('message', 'Image Updated');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }
}
