<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only' => 'postEdit','getDelete']);
    }

    public function postCreate($id){
    	$validator = \Validator::make(\Input::all(),['content' => 'required']);
    	if ($validator->fails()) {
    		return back()->withErrors($validator)->withInput();
    	}
        if (\Input::get('email')) {
            $user = User::where('email', \Input::get('email'))->first();
            if ($user) {
                if ($user->role_id != 3) {
                    return redirect('/login');
                }
            }else{
                $user = User::create(['email'   =>\Input::get('email'),
                                      'name'    =>\Input::get('name'),
                                      'password'=>str_random(8)]);
                $user->save();
            }
        }else {
            $user = \Auth::user();
        }
    	$comment = new Comment();
    	$comment->content = \Input::get('content');
    	$comment->created_by = $user->id;
    	$comment->post_id = $id;
    	if (\Input::get('parent_id')) {
    		$comment->parent_id = \Input::get('parent_id');
    	}
    	$comment->save();
    	return back();
    }
    public function postEdit($id){
        $validator = \Validator::make(\Input::all(),['content'=>'required']);
        if ($validator->fails()) {
            return back();
        }
        $comment = Comment::find($id);
        $comment->content = \Input::get('content');
        $comment->save();
        return back();
    }
    public function getDelete($id){
        Comment::find($id)->delete();
        return back();
    }
}
