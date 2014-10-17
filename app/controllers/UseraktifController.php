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
		$user_aktif = Radius_Radacct::where('acctstoptime', '=', NULL)->get();
		return View::make('user_aktif.index', compact('user_aktif'));
	}


	public function kick_user(){
		$ip = Input::get('ip');
		$username = Input::get('username');
		$nas_ip = Input::get('nas_ip');
		$get_nas_data = Radius_Nas::where('nasname', '=', $nas_ip)->first();
		$nas_secret = $get_nas_data->secret;
 
 
SSH::run(array(
    'echo User-Name='.$username.',Framed-IP-Address='.$ip.'|/usr/bin/radclient -x '.$nas_ip.':1700 disconnect '.$nas_secret,
 
));
 
     	//$command = 'ssh root@192.168.2.153 "echo User-Name=$username,Framed-IP-Address=$ip|/usr/bin/radclient -x $nas_ip:1700 disconnect $nas_secret"';
      //exec($command);		
	}

}