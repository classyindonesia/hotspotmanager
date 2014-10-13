<?php

class ConfigController extends BaseController {


	public function __construct(){
		View::share('config', true);
	}


	public function index(){
  		return View::make('config.index');
	}



	public function update_variable(){
		$var = Input::get('variable');
		$val = Input::get('value');
		$o = Setup_Variable::where('variable', '=', $var)->first();
		$o->value = $val;
		$o->save();
		return 'sukses';
	}

}

