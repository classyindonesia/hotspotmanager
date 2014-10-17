@extends('template.index')

@section('main')
 
<h2>Config</h2>
 
<table class='table'>
	<tr valign='center'>
		<td width='140px'>Nama Tempat</td>
		<td> 
			<input class='form-control' id='var1' type='text' value='{{ Fungsi::setup_variable("nama_tempat") }}'>
  	</td>
		<td width='15%'> <button class='btn btn-success' id='update1'>update</button> </td>
	</tr>

  
	<tr valign='center'>
		<td width='140px'>Alamat</td>
		<td> 
			<input class='form-control' id='var2' type='text' value='{{ Fungsi::setup_variable("alamat") }}'>
  	</td>
		<td width='15%'> <button class='btn btn-success' id='update2'>update</button> </td>
	</tr>


	<tr valign='center'>
		<td width='140px'>Website</td>
		<td> 
			<input class='form-control' id='var3' type='text' value='{{ Fungsi::setup_variable("website") }}'>
  	</td>
		<td width='15%'> <button class='btn btn-success' id='update3'>update</button> </td>
	</tr>


	<tr valign='center'>
		<td width='140px'>Alamat Email</td>
		<td> 
			<input class='form-control' id='var4' type='text' value='{{ Fungsi::setup_variable("alamat_email") }}'>
  	</td>
		<td width='15%'> <button class='btn btn-success' id='update4'>update</button> </td>
	</tr>


	<tr valign='center'>
		<td width='140px'>IP Server Radius</td>
		<td> 
			<input class='form-control' id='var5' type='text' value='{{ Fungsi::setup_variable("ip_radius_server") }}'>
  	</td>
		<td width='15%'> <button class='btn btn-success' id='update5'>update</button>
			 <i data-toggle='tooltip' title='untuk kick user/ agar bs dipisah dgn radius server' class='fa fa-question-circle'></i>

		 </td>
	</tr>


	<tr valign='center'>
		<td width='140px'>Password root Server Radius</td>
		<td> 
			<input class='form-control' id='var6' type='password' value='{{ Fungsi::setup_variable("password_root_radius") }}'>
  	</td>
		<td width='15%'> <button class='btn btn-success' id='update6'>update</button> 
			 <i data-toggle='tooltip' title='untuk kick user/ agar bs dipisah dgn radius server' class='fa fa-question-circle'></i>

		</td>
	</tr>


	<tr valign='center'>
		<td width='140px'>Radius Secret [untuk localhost]</td>
		<td> 
			<input class='form-control' id='var7' type='text' value='{{ Fungsi::setup_variable("rad_secret_localhost") }}'>
  	</td>
		<td width='15%'> <button class='btn btn-success' id='update7'>update</button>
			 <i data-toggle='tooltip' title='radius secret yg ada di /etc/freeradius/clients.conf' class='fa fa-question-circle'></i>
		 </td>
	</tr>




</table>

@include('config.script')

@stop