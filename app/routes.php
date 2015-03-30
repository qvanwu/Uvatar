<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// pages need authentication
Route::when('upload', 'auth');
Route::when('user/*', 'auth');
Route::when('avatar/*', 'auth');

// homepage
Route::get('/', 'HomeController@showHome');

# Login / logout
Route::post('/login', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');

// register
Route::get('/register', 'HomeController@showRegisterForm')->before('guest'); # Show register form

// Users controller
Route::resource('user', 'UsersController');

// Emails controller
Route::get('user/email/add', 'EmailsController@add');
Route::get('email/remove/{id}', 'EmailsController@remove');
Route::resource('email', 'EmailsController');

// Avatars controller
Route::resource('avatar', 'AvatarsController');

// API
Route::get('api', 'ApiController@show');
Route::get('api/generate', 'ApiController@generate');
Route::get('image/email/{email}/{size?}/{format?}', 'ApiController@getImageByEmail');
Route::get('image/{md5}/{size?}/{format?}', 'ApiController@getImage');
