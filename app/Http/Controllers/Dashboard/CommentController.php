<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('editor');
    }
    public function getIndex(){
        $posts = Post::all();
        return view('dashboard.comment.index',compact('posts'));
    }
}
