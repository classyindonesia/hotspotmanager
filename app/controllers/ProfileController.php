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







	public function update(){
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

 
}