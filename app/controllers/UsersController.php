<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'post';
	}


	/**
	 * Store a newly created resource in storage.
	 * Register a new user
	 *
	 * @return Response
	 */
	public function store()
	{
		# get input
		$data = Input::only(['username', 'email', 'password', 'password_confirmation']);

		# input validation
		$validator = Validator::make(
					$data,
					[
						'username' 					=> 'required|unique:users|min:4',
						'email'						=> 'required|unique:users|email|min:5',
						'password'					=> 'required|min:6|confirmed',
						'password_confirmation'		=> 'required|min:6'
					]
		);

		if($validator->fails()) {
			return Redirect::to('register')->withErrors($validator)->withInput();
		}
		else { # save record
			$hashedPassword = Hash::make(Input::get('password'));
			$user = new User;
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = $hashedPassword;
			$user->save();

			# create an user own directory and auto-login after sign up
			if (Auth::attempt(array(
							'email'		=> Input::get('email'),
							'password'	=> Input::get('password')
							), true)) {

				File::makeDirectory(public_path().'/userimage/'.Auth::user()->id, 0777, true, true);
				return Redirect::to('/user/home');
			}
			else return Redirect::to('/');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('user');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function login()
	{

		$input = Input::only('email', 'password');

		$validator = Validator::make(
			$input,
			[
				'email' 						=> 'required|email|min:5',
				'password'						=> 'required|min:6'
			]
		);

		if($validator->fails()) {
			return Redirect::to('/')->withErrors($validator)->withInput();
		}

		elseif (Auth::attempt($input, true)) {
			return Redirect::to('/user/home');
		}

		else {
			$authError = 'The username and password you entered did not match our records. Please double-check and try again.';
			return Redirect::to('/')->withErrors($authError)->withInput();
		}
	}

	public function logout()
	{
		if (Auth::check()) Auth::logout();

		return Redirect::to('/');
	}


}
