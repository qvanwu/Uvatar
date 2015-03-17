<?php

class HomeController extends BaseController {

	public function showWelcome()
	{
		$session = false;
		if ($session) {

		}
		else return View::make('home');
	}

}
