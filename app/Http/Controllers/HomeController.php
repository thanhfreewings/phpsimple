<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('editor',['only' => 'getAdmin','getChecklogin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(){
        $posts = Post::orderBy('created_at','desc')->paginate(20);
        return view('home',compact('posts'));
    }
    public function getAdmin(){
        $posts = Post::orderBy('created_at','desc')->take(10)->get();
        $users = User::orderBy('created_at','desc')->take(10)->get();
        return view('dashboard.index',compact('posts','users'));
    }
}
