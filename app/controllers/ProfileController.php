<?php

class ProfileController extends BaseController {

	public function __construct(){
		View::share('profile', true);
	}

	public function index(){
		$profile = Radius_Radgroupreply::groupBy('groupname')->paginate(10);
 		return View::make('profile.index')
 		->with('profile', $profile);
	}


	public function add(){
		return View::make('profile.form_add');
	}


	public function submit_add(){
		$input1 = [
		'groupname' => Input::get('nama'),
		 'attribute' => 'Mikrotik-Rate-Limit',
		 'op'		=> '==',
		 'value'	=> Input::get('max_download').'k/'.Input::get('max_upload').'k',
		 ];
		$input2 = [
		'groupname' => Input::get('nama'),
		 'attribute' => 'Simultaneous-Use',
		 'op'		=> '==',
		 'value'	=> Input::get('max_login'),
		 ];
		 Radius_Radgroupreply::create($input1);
		 Radius_Radgroupreply::create($input2);
		 return 'ok';
	}

 
}