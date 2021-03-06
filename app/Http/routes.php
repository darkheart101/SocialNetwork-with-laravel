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

Route::get('/', function () {
	if(Auth::user()){
		return redirect('dashboard');
	}else{
      	return view('welcome');
    }
});

Route::get('/profile', function () {
    if(Auth::user()){
        return view('profile');
    }else{
        return view('welcome');
    }
});

Route::get('/userprofile/{id}', 'UserController@getUser');

Route::get('/editprofile', function () {
    if(Auth::user()){
        return view('editprofile');
    }else{
        return view('welcome');
    }
});

Route::get('/dashboard', [
    'uses' => 'UserController@getDashboard',
    'as' => 'dashboard'
]);

Route::get('/logout', [
    'uses' => 'UserController@userLogout',
    'as' => 'logout'
]);


Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/edityourprofile', [
    'uses' => 'UserController@editYourProfile',
    'as' => 'edityourprofile'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::post('/poststatus', [
    'uses' => 'PostController@postStatus',
    'as' => 'poststatus'
]);

Route::post('/editstatus', [
    'uses' => 'PostController@editStatus',
    'as' => 'editstatus'
]);

Route::get('deletestatus/{id}', 'PostController@deletestatus');

Route::get('/userimage/{filename}',[
    'uses'=> 'UserController@getUserImage',
    'as' => 'account.image'
]);

