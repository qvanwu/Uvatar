<?php

class HomeController extends BaseController {

	public function showHome()
	{
		return View::make('home');
	}

	public function login()
	{

	}

	public function showRegisterForm()
	{
		return View::make('register');
	}
}
