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
Route::when('user/*', 'auth');

# Login / logout
Route::post('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');

/*
  * Registration and UserController
  *
  * Add resource to use all methods from UsersController
  * 'user.store' -> create a new user
  * 'user.update' -> update user profile
  */
Route::resource('user', 'UsersController');
Route::get('/register', 'HomeController@showRegisterForm')->before('guest'); # Show register form



/*
 * Avatars Controller
 *
 *
 */
Route::post('upload', array('before' => 'auth',
            'uses' => 'AvatarsController@create'));




########## test zone ###############
Route::any('test', 'BaseController@test');


####################################