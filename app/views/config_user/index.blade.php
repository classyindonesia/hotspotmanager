@extends('template.index')
@section('main')

<button id='simpan' class='btn btn-success pull-right'> <i class='fa fa-floppy-o'></i> UPDATE</button>
<h3>My Profile</h3>
<hr>

<style type="text/css">
.tabel_config td {
	padding : 2px;
}
</style>
 


<table class='tabel_config' width='100%'>
  
	<tr style='border-bottom: 1px solid #ccc;'>
		<td width='20%'>Username</td>
		<td>{{ $nama->username }}</td>
	</tr>

	<tr style='border-bottom: 1px solid #ccc;'>
		<td>Nama</td>
		<td>{{ $nama->nama }}</td>
	</tr>

 



	<tr>
 	<td colspan='2'>  <h4>Password </h4>   </td>		 
	</tr>


	<tr>
		<td> password saat ini</td>
		<td> <input type='password' id='c_pass' class='form-control' placeholder='password saat ini...' /> </td>
	</tr>	

	<tr>
		<td> password baru</td>
		<td> <input type='password' id='n_pass1' class='form-control' placeholder='password password baru...' /> </td>
	</tr>		

	<tr>
		<td> [re-enter] password baru</td>
		<td> <input type='password' id='n_pass2' class='form-control' placeholder='[re-enter] password password baru...' /> </td>
	</tr>	

 
</table>


<script type="text/javascript">
$('#simpan').click(function(){
	c_pass = $('#c_pass').val();
	n_pass1 = $('#n_pass1').val();
	n_pass2 = $('#n_pass2').val();

if(c_pass == '' || n_pass1 == '' || n_pass2 == ''){

	return false;
}


$.ajax({
	url : '{{ URL::route("config_user_update") }}',
	type : 'post',
	data : {c_pass : c_pass, n_pass1 : n_pass1, n_pass2 : n_pass2},
	error : function(err){
		alert('error! terjadi kesalahan pada sisi server!');
	},
	success:function(ok){
		alert(ok);
	}
})



})

</script>


@stop