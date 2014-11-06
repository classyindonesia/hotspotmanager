<?php

class UserHotspotController extends BaseController {

private $output;
 

	public function __construct(){
		View::share('user_hotspot', true);
	}

	public function index(){
		if(Session::has('pencarian')){
			$userhotspot = Mst_Data_User::where('nama', 'like', '%'.Session::get('pencarian').'%')->with('radusergroup')
			->orderBy('id', 'DESC')
			->paginate(10);

			if(count($userhotspot)<=0){
				$userhotspot = Mst_Data_User::where('username', 'like', '%'.Session::get('pencarian').'%')->with('radusergroup')
				->orderBy('id', 'DESC')
				->paginate(10);

			}

		}else{
			$userhotspot = Mst_Data_User::with('radusergroup')
			->orderBy('id', 'DESC')
			->paginate(10);			
		}

		return View::make('user_hotspot.index')
		->with('userhotspot', $userhotspot)
		->with('user_hotspot_home', true);
	}


	public function submit_search(){
		if(Input::get('pencarian')){
			if(Input::get('pencarian') != ''){
				Session::put('pencarian', Input::get('pencarian'));
			}
		}else{
			Session::forget('pencarian');
		}
		return 'ok';
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


	public function import(){
		$data = ['' => '-pilih profile template-'];
		$group = Radius_Radgroupreply::select(DB::raw('distinct groupname as id'))->get();
		foreach($group as $list){
			$data[$list->id] = $list->id;
		}		
		return View::make('user_hotspot.popup.import', compact('data'));
	}

	public function do_import(){
        if(!file_exists($_FILES['userfile']['tmp_name']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
        Session::flash('pesan', '<span class="alert alert-danger"> error! no file! </span>');
        return Redirect::to("user_hotspot");      
        }else{
            $file = $_FILES['userfile']['tmp_name'];
                $data = new Reader($file); 
                $a = $data->rowcount($sheet_index=0); 
				//$data = new Reader($file);                 
             for($i=1;$i<=$a;$i++){
                if($i != 1 && $i != 2){                    
                      $no  = trim($data->val($i, 'B')); //username
                      $no2 = trim($data->val($i, 'C')); // Nama User
                      $no3 = trim($data->val($i, 'D')); // Password
                       if($no != NULL && $no2 != NULL){



		$user = Radius_Radcheck::where('username', '=', Input::get('username'))->first();
		
		if(count($user) <= 0){

			if(empty($no3)){
				$password = $no;
			}else{
				$password = $no3;
			}

			/* insert to radcheck */
			$data_radcheck = [
				'username' => $no,
				'attribute'	=> 'Cleartext-Password',
				'op'		=> ':=',
				'value'	=> $password
			];
			Radius_Radcheck::create($data_radcheck);
			/* end of insert to radcheck */

			/* insert to radusergroup */
			$data_radusergroup = [
				'username' => $no,
				'groupname'	=> Input::get('profile'),
				'priority'	=> 1
			];
			Radius_Radusergroup::create($data_radusergroup);
			/* end of insert to radusergroup */


			$data_user = [
			'username'	=> $no,
			'ref_user_level_id'	=> 2,
			'password'	=> Hash::make($password)
			];
			Mst_User::create($data_user);


			$mst_data_user = [
			'username'	=> $no,
			'nama'	=> $no2,
			'keterangan'	=> ''
			];
			Mst_Data_User::create($mst_data_user);
		}





                      }
                }
            }
            Session::flash('pesan', '<span class="alert alert-success"> berhasil export </span>');
        return Redirect::to('user_hotspot');
        }		
	}



	public function view_detail($id){
		$d = Radius_Radcheck::where('username', '=', $id)->first();
		return View::make('user_hotspot.popup.view_detail', compact('d'));
	}



}