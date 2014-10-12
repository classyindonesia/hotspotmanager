<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<h3>Tambah User Hotspot</h3>

<input data-toggle='tooltip' title='username' type='text' id="username" class='form-control' placeholder='username...'   />
<br>
<input data-toggle='tooltip' title='password' type='password' id="password" class='form-control' placeholder='password...'   />
<br>
 
{{ Form::select('jenis_user', 
$data, '', 
['id' => 'profile', 'class' => 'form-control', 'data-toggle' => 'tooltip', 'title' => 'profile template']) }}
<br>

<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> simpan</button>

<script type="text/javascript">
$('#simpan').click(function(){

username = $('#username').val();
password = $('#password').val();
profile = $('#profile').val();
if(username == '' || password == '' || profile == ''){
	return false;
}

$.ajax({
	url : '{{ URL::to("user_hotspot/insert") }}',
	data : {username : username, profile : profile, password : password},
	type : 'post',
	error : function(err){
		alert('error! terjadi kesalahan pada sisi server!');
	},
	success:function(ok){
		alert('saved!');
		window.location.reload();
	}
})


});
</script>