<?php

class HomeController extends BaseController {

	public function showHome()
	{
		return View::make('home');
	}


	public function showRegisterForm()
	{
		return View::make('register');
	}

	public function login()
	{

		$input = Input::only('email', 'password');

			if (Auth::attempt($input, true)) {
				return Redirect::to('/');
			}
			else {
				return 'not ok';
			}
	}

	public function logout()
	{
		if (Auth::check()) Auth::logout();

		return Redirect::to('/');
	}
}
