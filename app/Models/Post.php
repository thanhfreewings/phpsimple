<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Post;

class Post extends Model
{
    protected $table = "posts";
    public function user(){
    	return $this->belongsTo('App\Models\User','created_by','id');
    }
    public function countComment(){
    	return $this->hasMany('App\Models\Comment','post_id','id')->count();
    }
    public static function recentPosts(){
    	return Post::orderBy('created_at','desc')->take(5)->get();
    }
    public static function getPostToSelect($selected){
        $posts = Post::all();
        $result = [];
        for ($i=0; $i < count($posts); $i++) {
            $check = true;
            for ($j=0; $j < count($selected); $j++) {
                if ($posts[$i]->id == $selected[$j]->post_id) {
                    $check = false;
                }
            }
            if ($check == true) {
                $result[] = $posts[$i];
            }
        }
        return $result;
    }
    public static function getTimeCreated($post){
        $seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($post->created_at);

        $years = floor($seconds / (3600*24*30*12));
        $months = floor($seconds / (3600*24*30));
        $day = floor($seconds / (3600*24));
        $hours = floor($seconds / 3600);
        $mins = floor(($seconds - ($hours*3600)) / 60);
        $secs = floor($seconds % 60);

        if($seconds < 60)
            $time = $secs." vừa xong";
        else if( 60 <= $seconds && $seconds < 60*2 )
            $time = $mins." phút trước";
        else if(60*2 <= $seconds && $seconds < 60*60 )
            $time = $mins." phút trước";
        else if( 60*60*1 <= $seconds && $seconds < 60*60*2)
            $time = $hours." giờ trước";
        else if( 60*60*2 <= $seconds && $seconds < 60*60*24)
            $time = $hours." giờ trước";
        else if(60*60*24 <= $seconds && $seconds < 60*60*24*2)
            $time = $day." ngày trước";
        else if(60*60*24*2 <= $seconds && $seconds < 60*60*24*30)
            $time = $day." ngày trước";
        else if(60*60*24*30*1 <= $seconds && $seconds < 60*60*24*30*2)
            $time = $months." tháng trước";
        else if(60*60*24*30*2 <= $seconds && $seconds < 60*60*24*30*12)
            $time = $months." tháng trước";
        else if(60*60*24*30*12 <= $seconds && $seconds < 60*60*24*30*12*2)
            $time = $years." năm trước";
        else
            $time = $years." năm trước";

        return $time;
    }
}
