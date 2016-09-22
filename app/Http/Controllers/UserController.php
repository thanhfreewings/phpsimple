<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use App\Helper\MenuHelper;

class UserController extends Controller
{
	public function __construct(){
		MenuHelper::set('user');
	}
    public function getView($id){
        $user = User::findOrFail($id);
        return view('user.view',compact('user'));
    }
    public function getProfile(){
        $user = \Auth::user();
        return view('user.profile',compact('user'));
    }
    public function postProfile(){
        $rules = array('name'      =>'required|max:255',
                       'avatar'    =>'mimes:jpeg,jpg,png,gif|max:10000');
        $validator = \Validator::make(\Input::all(),$rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $inputs = \Input::all();
        $user = \Auth::user();
        $user->name = $inputs['name'];
        $user->address = $inputs['address'];
        $user->phone = $inputs['phone'];
        if (\Input::file('avatar')) {
            $extension = \Input::file('avatar')->getClientOriginalName();
            $fileName = time().'_'.$extension;
            \Input::file('avatar')->move('uploads/avatars', $fileName);
            $user->avatar = $fileName;
        }
        $user->save();
        \Session::flash('success','Profile is updated!');
        return back();
    }
    public function postPassword(){
        $rules = array('old-password'  => 'required',
                    'new-password' => 'required|min:6|different:old-password',
                    'confirm-new-password' => 'required|same:new-password');
        $validator = \Validator::make(\Input::all(),$rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if (\Auth::attempt(['password' => \Input::get('old-password')])) {
            $user = \Auth::user();
            $user->password = bcrypt(\Input::get('new-password'));
            \Session::flash('success','Change password successfully.');
            $user->save();
        }else{
            \Session::flash('error','the password is incorrect, try again.');
        }
        return back();
    }
}
