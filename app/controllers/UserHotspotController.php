<?php

class UserHotspotController extends BaseController {

private $output;
 

	public function __construct(){
		View::share('user_hotspot', true);
	}

	public function index(){
		$userhotspot = Mst_Data_User::with('radusergroup')
		->orderBy('id', 'DESC')
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
		$user = Radius_Radcheck::where('username', '=', Input::get('username'))->first();
		if(count($user)>0){
			return 1; //jika user sudah ada
		}else{

			/* insert to radcheck */
			$data_radcheck = [
				'username' => Input::get('username'),
				'attribute'	=> 'Cleartext-Password',
				'op'		=> ':=',
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


			$mst_data_user = [
			'username'	=> Input::get('username'),
			'nama'	=> Input::get('nama'),
			'keterangan'	=> Input::get('keterangan')
			];
			Mst_Data_User::create($mst_data_user);

			return 0;
		}



	}
 

	public function del(){	

		$mst_data_user = Mst_Data_User::find(Input::get('id'));
		$data_radcheck = Radius_Radcheck::where('username', '=', $mst_data_user->username)->first();
		$data_mst_user = Mst_User::where('username', '=', $mst_data_user->username)->first();		
		$data_radusergroup = Radius_Radusergroup::where('username', '=', $mst_data_user->username)->first();
		if(count($data_mst_user)>0) $data_mst_user->delete();
		if(count($mst_data_user)>0) $mst_data_user->delete();
		if(count($data_radusergroup)>0) $data_radusergroup->delete();
		if(count($data_radcheck)>0) $data_radcheck->delete();

		return 'ok';

	}


	public function test_radius(){

 		$username = Input::get('username');
 		$u = Radius_Radcheck::where('username', '=', Input::get('username'))
 		->where('attribute', '=', 'Cleartext-Password')
 		->first();
 		$pass = $u->value;
  $command = ['echo User-Name='.$username.',User-Password="'.$pass.'"|/usr/bin/radclient -x  127.0.0.1 auth '.Fungsi::setup_variable("rad_secret_localhost")];
SSH::run($command, function($line){
	 $this->output = $line.PHP_EOL.'\n';
});
$hasil_jadi = '';
$hasil = explode(' ', $this->output);
for($i=0;$i<=count($hasil)-1;$i++){
	if($hasil[$i] == 'Access-Accept'){
		$hasil_jadi = 'ok';
	}
}
if($hasil_jadi == 'ok') {
	$hasil_jadi = '<span class="text-success">Radius Server Repply : OK!</span>';
}else{
	$hasil_jadi = '<span class="text-danger">Radius Server Not Responding!</span>';	
}

 return 'User-Name : '.$username.' <hr><b>'.$hasil_jadi.'</b>';

	}



}