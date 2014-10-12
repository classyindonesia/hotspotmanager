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
		->with('userhotspot', $userhotspot)
		->with('user_hotspot_home', true);
	}

	public function add(){
		$data = ['' => '-pilih profile template-'];
		$group = Radius_Radgroupreply::select(DB::raw('distinct groupname as id'))->get();
		foreach($group as $list){
			$data[$list->id] = $list->id;
		}
		return View::make('user_hotspot.popup.add', compact('group', 'data'));
	}

	public function insert(){
		/* insert to radcheck */
		$data_radcheck = [
			'username' => Input::get('username'),
			'attribute'	=> 'Cleartext-Password',
			'op'		=> '=:',
			'value'	=> Input::get('password')
		];
		Radius_Radcheck::create($data_radcheck);
		/* end of insert to radcheck */

		/* insert to radusergroup */
		$data_radusergroup = [
			'username' => Input::get('username'),
			'groupname'	=> Input::get('profile'),
			'priority'	=> 1
		];
		Radius_Radusergroup::create($data_radusergroup);
		/* end of insert to radusergroup */


		$data_user = [
		'username'	=> Input::get('username'),
		'ref_user_level_id'	=> 2,
		'password'	=> Hash::make(Input::get('password'))
		];
		Mst_User::create($data_user);




	}
 

}