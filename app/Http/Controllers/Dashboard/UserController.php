<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use App\Helper\MenuHelper;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function __construct(){
		MenuHelper::set('user');
        $this->middleware('admin',['only' => 'postRole']);
        $this->middleware('editor');
	}
    public function getIndex(){
    	$users = User::orderBy('role_id','asc')->get();
    	return view('dashboard.user.index',compact('users'));
    }
    public function postRole($id){
    	$user = User::find($id);
    	$user->role_id = \Input::get('role_id');
    	$user->save();
    	return back();
    }
    public function getView($id){
    	$user = User::find($id);
    	return view('dashboard.user.view',compact('user'));
    }
    public function getProfile(){
        $user = \Auth::user();
        return view('dashboard.user.profile',compact('user'));
    }
    public function getUser(){
        $users = User::where('role_id',3)->get();
        return view('dashboard.user.user',compact('users'));
    }
    public function getEditor(){
        $users = User::where('role_id',2)->get();
        return view('dashboard.user.editor',compact('users'));
    }
}
