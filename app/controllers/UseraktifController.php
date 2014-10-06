<?php

class UseraktifController extends BaseController {

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
		View::share('user_aktif', true);
	}




	public function index(){
		return View::make('user_aktif.index');
	}


	public function kick_user(){
		$ip = Input::get('ip');
		$username = Input::get('username');
		$nas_ip = Input::get('nas_ip');
		$get_nas_data = Radius_Nas::where('nasname', '=', $nas_ip)->first();
		$nas_secret = $get_nas_data->secret;



     	$command = "echo User-Name=$username,Framed-IP-Address=$ip|/usr/bin/radclient -x $nas_ip:1700 disconnect $nas_secret";
      exec($command);		
	}

}