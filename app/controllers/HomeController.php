<?php

class HomeController extends BaseController {

	public function showHome()
	{
		if (Auth::check()) {
			return Redirect::to('/user/'.Auth::user()->getUserName());
		}
		return View::make('home');
	}


	public function showRegisterForm()
	{
		return View::make('register');
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
				return Redirect::to('/user/'.Auth::user()->getUserName());
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
