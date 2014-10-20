<?php
class ConfigUserController extends BaseController{


	public function __construct(){
		View::share('config_user', true);
	}

	public function index(){
 		$nama = Mst_Data_User::where('username', '=', Auth::user()->username)->first();
		return View::make('config_user.index', compact('nama'));
	}


	public function update(){
		$hashedPassword = Auth::user()->password;

		if (Hash::check(Input::get('c_pass'), $hashedPassword)){
			$pass1 = Input::get('n_pass1');
			$pass2 = Input::get('n_pass2');
			if($pass1 == $pass2){
				 
				$u = Mst_User::find(Auth::user()->id);
				$u->password = Hash::make($pass1);
				$u->save();

				$uh = Radius_Radcheck::where('username', '=', Auth::user()->username)
				->where('attribute', '=', 'Cleartext-Password')
				->first();
				$uh->value = $pass1;
				$uh->save();


				return 'saved!';
			}else{
				return 'error! password tdk sama!';
			}

		}else{
			return 'password salah!';
		}

	}


}