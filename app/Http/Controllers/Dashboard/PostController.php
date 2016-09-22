<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Helper\MenuHelper;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Php;
use App\Models\Laravel;
use App\Models\Bootstrap;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct(){
        MenuHelper::set('post');
        $this->middleware('editor');
    }

    public function getIndex(){
    	$posts = Post::orderBy('created_at','desc')->get();
    	return view('dashboard.post.index',compact('posts'));
    }
    public function getCreate(){
        return view('dashboard.post.create');
    }
    public function postCreate(){
        $rules = array('title' => 'required|unique:posts', 'content' => 'required');
        $validator = \Validator::make(\Input::all(),$rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $inputs = \Input::all();
        $post = new Post();
        $post->title = $inputs['title'];
        $post->content = $inputs['content'];
        if ($inputs['introduction']) {
            $post->introduction = $inputs['introduction'];
        }
        if (\Input::file('attachment')) {
            $destinationPath = 'uploads';
            $firstFile = \Input::file('attachment')->getClientOriginalName();
            $extension = $this->convertNameToEnglish($firstFile);
            $fileName = time().'_'.$extension;
            \Input::file('attachment')->move($destinationPath, $fileName);
            $post->attachment = '/uploads/'.$fileName;
        }
        $post->created_by = \Auth::user()->id;
        $post->save();
        return redirect('/post/view/'.$post->id);
    }
    function convertNameToEnglish($str) {
        // lowercase
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        // uppercase
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        return $str;
    }
    public function getMyposts(){
        $posts = Post::where('created_by',\Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('dashboard.post.myPosts',compact('posts'));
    }
    public function getEdit($id){
        $post = Post::findOrFail($id);
        return view('dashboard.post.edit',compact('post'));
    }
    public function postEdit($id){
        $inputs = \Input::all();
        $post = Post::findOrFail($id);
        if ($post->title == $inputs['title']) {
            $rules = array('content' => 'required');
        }else{
            $rules = array( 'title' => 'required|unique:posts',
                            'content' => 'required');
        }
        $validator = \Validator::make($inputs,$rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $post->title = $inputs['title'];
        $post->introduction = $inputs['introduction'];
        $post->content = $inputs['content'];

        if(isset($inputs['deleteAttachment'])){
            \File::delete(substr($post->attachment,1));
            $post->attachment = NULL;
        }
        if (\Input::file('attachment')) {
            if ($post->attachment) {
                \File::delete(substr($post->attachment,1));
            }
            $destinationPath = 'uploads';
            $firstFile = \Input::file('attachment')->getClientOriginalName();
            $extension = $this->convertNameToEnglish($firstFile);
            $fileName = time().'_'.$extension;
            \Input::file('attachment')->move($destinationPath, $fileName);
            $post->attachment = '/uploads/'.$fileName;
        }
        $post->save();
        return redirect('/post/view/'.$id);
    }
    public function postDelete($id){
        $post = Post::find($id);
        if ($post->attachment) {
            \File::delete(substr($post->attachment,1));
        }
        $post->delete();
        return redirect('/admin/post');
    }
    public function getSearch(){
        $keyword = $_GET["keyword"];
        $posts = Post::where('title', 'LIKE', '%'.$keyword.'%')->orderBy('created_at','desc')->get();
        \Session::put('keyword',$keyword);
        return view('dashboard.post.search',compact('posts'));
    }
    public function getCategories(){
        $posts = Post::all();
        $phps = Php::all();
        $bootstraps = Bootstrap::all();
        $laravels = Laravel::all();
        return view('dashboard.post.categories',compact('posts','phps','bootstraps','laravels'));
    }
    public function postAddphp(){
        $php = new Php();
        $php->post_id = \Input::get('phppost');
        $php->save();
        return back();
    }
    public function postAddbootstrap(){
        $bootstrap = new Bootstrap();
        $bootstrap->post_id = \Input::get('bootstrappost');
        $bootstrap->save();
        return back();
    }
    public function postAddlaravel(){
        $laravel = new Laravel();
        $laravel->post_id = \Input::get('laravelpost');
        $laravel->save();
        return back();
    }
    public function getDeletebootstrap($id){
        $bootstrap = Bootstrap::find($id);
        $bootstrap->delete();
        return back();
    }
    public function getDeletelaravel($id){
        $laravel = Laravel::find($id);
        $laravel->delete();
        return back();
    }
    public function getDeletephp($id){
        $php = Php::find($id);
        $php->delete();
        return back();
    }
}
