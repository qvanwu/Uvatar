<?php

class HomeController extends BaseController {

	public function showHome()
	{
		if (Auth::check()) {
			return Redirect::to('/user/home');
		}
		return View::make('home');
	}

	public function showRegisterForm()
	{
		return View::make('register');
	}

}
