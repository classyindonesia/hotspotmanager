<?php
class LogUsageController extends BaseController{


	public function __construct(){
		View::share('log_usage', true);
	}


	public function index(){
		$log_usage = Radius_Radacct::whereUsername(Auth::user()->username)
		->orderBy('radacctid', 'DESC')
		->with('nas')
		->paginate(10);
		return View::make('log_usage.index', compact('log_usage'));
	}


}