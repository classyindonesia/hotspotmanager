<?php

class NasController extends BaseController {


	public function __construct(){
		View::share('nas', true);
	}


	public function index(){
		$nas = Radius_Nas::paginate(5);
  		return View::make('nas.index', compact('nas'));
	}


	public function add(){
		return View::make('nas.popup.add');
	}

	public function insert(){
		$data = [
		'shortname'	=> Input::get('nama'),
		'nasname'	=> Input::get('ip'),
		'type'	=> 'other',
		'ports'	=> Input::get('port'),
		'secret'	=> Input::get('secret'),
		'description'	=> 'RADIUS Client',
		'user_mikrotik'	=> Input::get('user_mikrotik'),
		'password_mikrotik'	=> Input::get('password_mikrotik'),
		];	

		Radius_Nas::create($data);
	}


	public function edit($id){
		$nas = Radius_Nas::find($id);
		return View::make('nas.popup.edit', compact('nas'));
	}

	public function update(){
		$nas = Radius_Nas::find(Input::get('id'));
		$nas->shortname = Input::get('nama');
		$nas->nasname	= Input::get('ip');
		$nas->ports 	= Input::get('port');
		$nas->secret 	= Input::get('secret');
		$nas->user_mikrotik = Input::get('user_mikrotik');
		$nas->password_mikrotik	= Input::get('password_mikrotik');
		$nas->save();
		return 'ok';
	}


		public function del(){
			$o = Radius_Nas::find(Input::get('id'));
			$o->delete();
		}



		public function mikrotik_resource($id){
			$nas = Radius_Nas::find($id);
			return View::make('nas.popup.mikrotik_resource', compact('nas'));
		}
	



 

}

