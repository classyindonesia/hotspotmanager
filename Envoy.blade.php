@servers(['web' => 'root@192.168.2.153'])

@task('foo', ['on' => 'web'])
	
	echo User-Name={{ $username }},User-Password="{{ $pass }}"|/usr/bin/radclient -x  127.0.0.1 auth {{ $rad_secret_localhost }}

@endtask