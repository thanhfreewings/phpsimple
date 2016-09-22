<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    // Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

    // Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');

	Route::get('/facebook', 'Auth\FacebookAuthController@redirect');
	Route::get('/callback', 'Auth\FacebookAuthController@callback');
    Route::get('/', 'HomeController@getIndex');
	Route::get('/home', 'HomeController@getIndex');
	Route::controllers([
        'post'  	=> 'PostController',
        'user'  	=> 'UserController',
        'comment'   => 'CommentController'
    ]);

Route::group(['middleware' => 'auth'], function () {

	Route::get('/admin', 'HomeController@getAdmin');
	Route::controllers(['admin/user'  	=> 'Dashboard\UserController']);
	Route::controllers(['admin/post'  	=> 'Dashboard\PostController']);
    Route::controllers(['admin/comment' => 'Dashboard\CommentController']);
});

Route::auth();

