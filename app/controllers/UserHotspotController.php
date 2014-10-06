<?php

class UserHotspotController extends BaseController {

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
		View::share('user_hotspot', true);
	}

	public function index(){
		$userhotspot = Radius_Radcheck::with('radusergroup')
		->groupBy('username')
		->paginate(10);
		return View::make('user_hotspot.index')
		->with('userhotspot', $userhotspot);
	}
 

}