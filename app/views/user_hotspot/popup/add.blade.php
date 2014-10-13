<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<h3>Tambah User Hotspot</h3>

<input data-toggle='tooltip' title='nama' type='text' id="nama" class='form-control' placeholder='nama user...'   />
<br>

<input data-toggle='tooltip' title='username' type='text' id="username" class='form-control' placeholder='username...'   />
<br>
<input data-toggle='tooltip' title='password' type='password' id="password" class='form-control' placeholder='password...'   />
<br>
 
{{ Form::select('jenis_user', 
$data, '', 
['id' => 'profile', 'class' => 'form-control', 'data-toggle' => 'tooltip', 'title' => 'profile template']) }}
<br>
<input data-toggle='tooltip' title='keterangan' type='text' id="keterangan" class='form-control' placeholder='keterangan user...'   />
<br>
<button id='simpan' class='btn btn-success'><i class='fa fa-floppy-o'></i> simpan</button>

<script type="text/javascript">
$('#username').keydown(function(e) {

        // alert (e.keyCode);

	if (e.keyCode == 32) {
		return false;
	}
});


$('#simpan').click(function(){

username = $('#username').val();
nama = $('#nama').val();
keterangan = $('#keterangan').val();
password = $('#password').val();
profile = $('#profile').val();
if(username == '' || password == '' || profile == '' || nama == ''){
	return false;
}

	form_data = {
		username : username, 
		profile : profile, 
		password : password, 
		nama : nama, 
		keterangan : keterangan
	}

$.ajax({
	url : '{{ URL::to("user_hotspot/insert") }}',
	data : form_data,
	type : 'post',
	error : function(err){
		alert('error! terjadi kesalahan pada sisi server!');
	},
	success:function(ok){
		if(ok == 1){
			alert('error! user sudah ada! silahkan memilih user yg lain!')
		}else{
			alert('saved!');
			window.location.reload();			
		}
	}
})


});
</script>