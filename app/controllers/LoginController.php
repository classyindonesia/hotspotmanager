<?php

class LoginController extends BaseController {

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
		dd(App::detectEnvironment());
		return View::make('login');
	}


	public function check_login(){
		if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))){
		    return Redirect::intended('/');
		}else{
			return Redirect::to('login');
		}
	}



	public function logout(){
        Auth::logout();
	    return Redirect::to('login');		
	}

}