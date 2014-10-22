<?php
class ObrolanController extends BaseController{


	public function __construct(){
		View::share('obrolan', true);
	}


	public function index(){
		$list_pesan = Mst_Obrolan::take(20)->with('data_user')->orderBy('id', 'DESC')->paginate(20);
 		return View::make('obrolan.index', compact('list_pesan'));
	}



	public function insert(){
		$data = [
 		'username'	=> Input::get('username'),
		'pesan' => strip_tags(Input::get('pesan')),
		'ip'	=> $ip = Request::getClientIp(),
		];
		$insert = Mst_Obrolan::create($data);

	        $redis = Redis::connection();
	        $redis->publish('chat',  $insert->id);
	}

	public function show($id){
		$obrolan = Mst_Obrolan::whereId($id)->with('data_user')->first();
		return View::make('obrolan.show', compact('obrolan'));
	}



}