<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Matrix extends Command {

	protected $name = 'Matrix';
	protected $description = 'Publish events to Redis';

	public function fire(){
        $redis = Redis::connection();
        $redis->publish('user_aktif', 'das dasdsa das');
    }
 

	protected function getArguments()
	{
		return array(
			array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	} 
 

}
