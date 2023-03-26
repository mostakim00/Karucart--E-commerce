<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Exception;

class SocialLoginController extends Controller
{
    //For Google
    public function gotogoogle(){
        return Socialite::driver('google')->redirect();
    }
    
    public function googleUserInfo(){
        $googleUser = Socialite::driver('google')->user();
        $findUser = User::where('social_id', $googleUser->id)->first();

        if($findUser){
            Auth::login($findUser);
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
            $userdata = new User();
            $userdata->name = $googleUser->name; 
            $userdata->email = $googleUser->email; 
            $userdata->social_id = $googleUser->id;
            $userdata->password = encrypt($googleUser->id);
            $userdata->role_id = 'user';
            $userdata->user_source = 'Google';
            // dd($userdata);
            $userdata->save();
            Auth::login($userdata);
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
    
    
    
    
    
    
    // For Facebook
    public function gotofacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    
    public function facebookUserInfo(){
        $facebookUser = Socialite::driver('facebook')->user();
        $findUser = User::where('social_id', $facebookUser->id)->first();

        if($findUser){
            Auth::login($findUser);
            // return redirect()->intended(RouteServiceProvider::HOME);
        }
        else{
            $userdata = new User();
            $userdata->name = $facebookUser->name; 
            $userdata->email = $facebookUser->email; 
            $userdata->social_id = $facebookUser->id;
            $userdata->password = encrypt($facebookUser->id);
            $userdata->role_id = 'user';
            $userdata->user_source = 'Facebook';
            dd($userdata);
            // $userdata->save();
            // return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
