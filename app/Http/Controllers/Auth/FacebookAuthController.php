<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\Models\User;

class FacebookAuthController extends Controller
{
	public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $fUser = Socialite::driver('facebook')->user();
        $user = User::where('email',$fUser->email)->first();
        if(!$user){
            $user = User::create(['email'=>$fUser->email,
                                  'name'=>$fUser->name,
            					  'active'=>'Y',
            					  'password'=>str_random(8)]);
        }
        $user->avatar = $fUser->avatar;
        $user->save();

        \Auth::login($user);
        return redirect('/');
    }
}
