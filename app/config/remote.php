<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Default Remote Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default connection that will be used for SSH
	| operations. This name should correspond to a connection name below
	| in the server list. Each connection will be manually accessible.
	|
	*/

	'default' => 'production',

	/*
	|--------------------------------------------------------------------------
	| Remote Server Connections
	|--------------------------------------------------------------------------
	|
	| These are the servers that will be accessible via the SSH task runner
	| facilities of Laravel. This feature radically simplifies executing
	| tasks on your servers, such as deploying out these applications.
	|
	*/

	'connections' => array(

		'production' => array(
			'host'      => '192.168.2.153',
			'username'  => 'root',
			'password'  => 'kediri',
			'key'       => '',
			'keyphrase' => '', //'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCrmgqcIFEv4ABY14DKDdsl/4bENxiHRq+IQFDXbjwiWOotUaG5PefVl+PER7orzUvKG9QTZ96JwjUuDa0O+v53ihI2yoeI/7goMZgdUtYytIR84aKYqhXa4uLPUtkkfrh/Rchk992CgFb9zw1/wHRuz/BZAxm58t76kDWuwUvSte0FWocv0cVYRHhGFRLg9+W4PBcn1dQIQ8Vzp39KI5vRwOHpd/CxIIKyg1bMnLyTU93hKSnAHpiD9trsfDjqF2Rts9+g/xlVL3tEu1M7id51U/xdcKwE6M4WGaTmBLH335/cuSITCtwyZaJCYVE+0QbM2tXs8x+JyFpaI+l2Rgc9 man3@man3-System-Product-Name',
			'root'      => '/root/',
		),

	),

	/*
	|--------------------------------------------------------------------------
	| Remote Server Groups
	|--------------------------------------------------------------------------
	|
	| Here you may list connections under a single group name, which allows
	| you to easily access all of the servers at once using a short name
	| that is extremely easy to remember, such as "web" or "database".
	|
	*/

	'groups' => array(

		'web' => array('production')

	),

);