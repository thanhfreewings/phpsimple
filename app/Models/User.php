<?php

namespace App\Models;

// use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatar(){
        if ($this->avatar) {
            if (substr($this->avatar,0,4) == "http") {
                return $this->avatar;
            }else{
                return '/uploads/avatars/'.$this->avatar;
            }
        }else{
            return '/uploads/avatars/no-avatar.png';
        }
    }
    public function countPost(){
        return Post::where('created_by',$this->id)->count();
    }
    public function posts(){
        return $this->hasMany('App\Models\Post','created_by','id');
    }
}
