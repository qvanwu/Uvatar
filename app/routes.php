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

Route::get('/', 'HomeController@showHome');
Route::when('upload', 'auth');
Route::when('user/*', 'auth');
Route::when('avatar/*', 'auth');

# Login / logout
Route::post('/login', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');

/*
  * Registration and UserController
  *
  * Add resource to use all methods from UsersController
  * 'user.store' -> create a new user
  * 'user.update' -> update user profile
  */

Route::resource('user', 'UsersController');
Route::get('/register', 'HomeController@showRegisterForm')->before('guest'); # Show register form

Route::get('user/email/add', 'EmailsController@add');
Route::get('email/remove/{id}', 'EmailsController@remove');
Route::resource('email', 'EmailsController');
Route::resource('avatar', 'AvatarsController');


Route::get('api', 'ApiController@show');
Route::get('api/generate', 'ApiController@generate');
Route::get('image/email/{email}/{size?}/{format?}', 'ApiController@getImageByEmail');
Route::get('image/{md5}/{size?}/{format?}', 'ApiController@getImage');
########## test zone ###############
Route::any('test', 'BaseController@test');

####################################