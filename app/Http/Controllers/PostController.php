<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Helper\MenuHelper;
use App\Models\Post;
use App\Models\Php;
use App\Models\Bootstrap;
use App\Models\Laravel;
use App\Models\Comment;

class PostController extends Controller
{
    public function __construct(){
        MenuHelper::set('post');
    }

    public function getIndex(){
    	$posts = Post::orderBy('created_at','desc')->get();
    	return view('post.index',compact('posts'));
    }
    public function getView($id){
        $post = Post::findOrFail($id);
        $post->view_counter += 1;
        $post->save();
        $comments = Comment::where('post_id',$id)->orderBy('created_at','desc')->get();
    	return view('post.view',compact('post','comments'));
    }
    public function getSearch(){
        $keyword = $_GET["keyword"];
        $posts = Post::where('title', 'LIKE', '%'.$keyword.'%')->orderBy('created_at','desc')->get();
        \Session::put('keyword',$keyword);
        return view('post.search',compact('posts'));
    }
    public function getCategory($category){
        if ($category == 'php') {
            $categoryIds = Php::all();
        }else if ($category == 'laravel') {
            $categoryIds = Laravel::all();
        }else{
            $categoryIds = Bootstrap::all();
        }
        return view('post.category',compact('categoryIds'));
    }
}
