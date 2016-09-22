<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Mail;
use App\Models\User;

class EmailController extends Controller
{
    public function test(){
        $user = User::where('email','nguyenvanthanh9595@gmail.com')->first();
        Mail::send('emails.test', ['user' => $user], function ($m) use ($user) {
            $m->from('nguyenvanthanh9595@gmail.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
        echo 'success';
    }

}
