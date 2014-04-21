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
	public function __construct(){
		View::share('home', true);
	}

	public function index(){
		$userhotspot = Radius_Radcheck::with('radusergroup')
		->groupBy('username')
		->paginate(10);
		return View::make('home.index')
		->with('userhotspot', $userhotspot);
	}


	public function kick_user(){
		$ip = Input::get('ip');
		$username = Input::get('username');
     	$command = "echo User-Name=$username,Framed-IP-Address=$ip|/usr/bin/radclient -x 192.168.2.1:1700 disconnect 123";
      exec($command);		
	}

}