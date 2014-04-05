<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index(){
		return View::make('home');
	}


	public function kick_user(){
		$ip = Input::get('ip');
		$username = Input::get('username');
     	$command = "echo User-Name=$username,Framed-IP-Address=$ip|/usr/bin/radclient -x 192.168.2.1:1700 disconnect rahasia123";
      exec($command);		
	}

}