<?php

class ProfileController extends BaseController {

	public function __construct(){
		View::share('profile', true);
	}

	public function index(){
		$profile = Mst_Profile::with('radusergroup', 'atribut')->paginate(10);
		//$profile = Radius_Radgroupreply::groupBy('groupname')->paginate(10);

 		return View::make('profile.index')
 		->with('profile', $profile);
	}


	public function add(){
		return View::make('profile.popup.add');
	}


	public function submit_add(){
		$input = [
		'nama' => Input::get('nama'),
 		 ];
		 Mst_Profile::create($input);
		 return 'ok';
	}
  
	public function view_atribut($id){
		$profile = Mst_Profile::find($id);
		$atribut = Radius_Radgroupreply::where('groupname', '=', $profile->nama)->get();
		return View::make('profile.popup.list_atribut', compact('profile', 'atribut'));
	}

	public function add_atribut($id){
		$profile = Mst_Profile::find($id);
		return View::make('profile.popup.add_atribut', compact('profile'));
	}


	public function submit_add_atribut(){
		$input = [
		'attribute' => Input::get('nama'),
		'op'	=> Input::get('operator'),
		'value'	=> Input::get('value'),
		'groupname'	=> Input::get('groupname'),
 		 ];
		 Radius_Radgroupreply::create($input);
		 return 'ok';		
	}

	public function del_atribut(){
		$o = Radius_Radgroupreply::find(Input::get('id'));
		$o->delete();
	}

	public function edit_atribut($id, $id_atribut){
		$profile = Mst_Profile::find($id);
		$atribut = Radius_Radgroupreply::find($id_atribut);
		return View::make('profile.popup.edit_atribut', compact('profile', 'atribut'));
	}


	public function submit_update_atribut(){
		$a = Radius_Radgroupreply::find(Input::get('id'));
		$a->attribute = Input::get('nama');
		$a->op 			= Input::get('operator');
		$a->value 		= Input::get('value');
		$a->save();

	 return 'ok';		
	}

 


	public function del(){
		$profile = Mst_Profile::find(Input::get('id'));

		$p = Radius_Radgroupreply::where('groupname', '=', $profile->nama)->first();
		if(count($p)>0){
			$nm_p = $p->groupname;
			$data = Radius_Radgroupreply::where('groupname', '=', $nm_p)->get();
			foreach($data as $list){
				$list->delete();
			}
				
		}
		$profile->delete();
		return 'ok';
	}


	public function clear_user(){
		$profile = Mst_Profile::find(Input::get('id'));

		$group = Radius_Radusergroup::whereGroupname($profile->nama)->get();
		foreach($group as $list){

			$data_user = Mst_Data_User::where('username', '=', $list->username)->first();
			$data_user->delete();

			$mst_user = Mst_User::where('username', '=', $list->username)->first();
			$mst_user->delete();
			//del user
			$user = Radius_Radcheck::where('username', '=', $list->username)->first();
			$user->delete();
			//del user's group
			$list->delete();
		}


 		return 'ok';		
	}







	public function view_check_atribut($id){
		$profile = Mst_Profile::find($id);
		$atribut = Radius_Radgroupcheck::where('groupname', '=', $profile->nama)->get();
		return View::make('profile.popup.list_check_atribut', compact('profile', 'atribut'));
	}

	public function add_check_atribut($id){
		$profile = Mst_Profile::find($id);
		return View::make('profile.popup.add_check_atribut', compact('profile'));
	}


	public function submit_add_check_atribut(){
		$input = [
		'attribute' => Input::get('nama'),
		'op'	=> Input::get('operator'),
		'value'	=> Input::get('value'),
		'groupname'	=> Input::get('groupname'),
 		 ];
		 Radius_Radgroupcheck::create($input);
		 return 'ok';		
	}



	public function edit_check_atribut($id, $id_atribut){
		$profile = Mst_Profile::find($id);
		$atribut = Radius_Radgroupcheck::find($id_atribut);
		return View::make('profile.popup.edit_check_atribut', compact('profile', 'atribut'));
	}


	public function submit_update_check_atribut(){
		$a = Radius_Radgroupcheck::find(Input::get('id'));
		$a->attribute = Input::get('nama');
		$a->op 			= Input::get('operator');
		$a->value 		= Input::get('value');
		$a->save();

	 return 'ok';		
	}
	public function del_check_atribut(){
		$o = Radius_Radgroupcheck::find(Input::get('id'));
		$o->delete();
	}	




 
}