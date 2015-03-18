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

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::only(['username', 'email', 'password', 'password_confirmation']);
		$validator = Validator::make(
					$data,
					[
						'username' 					=> 'required|min:4',
						'email'						=> 'required|email|min:5',
						'password'					=> 'required|min:6|confirmed',
						'password_confirmation'		=> 'required|min:6'
					]
		);

		if($validator->fails()) {
			return Redirect::to('register')->withErrors($validator)->withInput();
		}
		else {
			$hashedPassword = Hash::make(Input::get('password'));
			$user = new User;
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = $hashedPassword;
			$user->save();

			return Redirect::to('user/'.$user->username);

			// auto login after registering
			/*$userdata = array(
						'username' 	=> $user->username,
						'password'	=> $user->password);
			if (Auth::attempt($userdata, true)) {
				return Redirect::to('user/'.$user->username);
			}
			else return 'not ok';*/
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

}
