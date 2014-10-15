<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class migrasi_template extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'migrasi_template';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Migrasi template';

 
	public function fire()
	{
		$profile = Radius_Radgroupreply::all();
		foreach($profile  as $list){
			$p = Mst_Profile::where('nama', '=', $list->groupname)->first();
			if(count($p)<=0){
				Mst_Profile::create(['nama' => $list->groupname]);
				$this->info('get : '.$list->groupname.', INSERT');
			}else{
				$this->info('get : '.$list->groupname.', IGNORED');
			}
		}
	}

 

}
