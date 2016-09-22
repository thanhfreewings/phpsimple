<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User;
use App\Models\Post;

class Php extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'php';
    
    public function post(){
    	return $this->belongsTo('App\Models\Post','post_id','id');
    }
    public static function countPhp(){
    	return Php::all()->count();
    }
}
