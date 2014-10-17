<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
<h3>Edit NAS Device</h3>
<hr style='margin:3px;'>

<input value='{{ $nas->shortname }}' data-toggle='tooltip' title='nama' type='text' id="nama" class='form-control' placeholder='Nama...'   />
<br>
<input value='{{ $nas->nasname }}' data-toggle='tooltip' title='ip address' type='text' id="ip" class='form-control' placeholder='IP Address...'   />
<br>
<input value='{{ $nas->ports }}' data-toggle='tooltip' title='port' type='text' id="port" class='form-control' placeholder='Ports...'   />
<br>

<input value='{{ $nas->secret }}' data-toggle='tooltip' title='Secret' type='password' id="secret" class='form-control' placeholder='Secret...'   />
<br>
<input value='{{ $nas->user_mikrotik }}' data-toggle='tooltip' title='User Mikrotik' type='text' id="user_mikrotik" class='form-control' placeholder='user mikrotik...'   />
<br>

<input value='{{ $nas->password_mikrotik }}' data-toggle='tooltip' title='Password Mikrotik' type='password' id="password_mikrotik" class='form-control' placeholder='password mikrotik...'   />
<br>
<button id='simpan' class='btn btn-success'><i class='fa fa-floppy-o'></i> simpan</button>



<script type="text/javascript">
$('#nama').keydown(function(e) {
	if (e.keyCode == 32) {
		return false;
	}
});

$('#ip').keydown(function(e) {
	if (e.keyCode == 32) {
		return false;
	}
});
$('#port').keydown(function(e) {
	if (e.keyCode == 32) {
		return false;
	}
});



$('#simpan').click(function(){
	user_mikrotik = $('#user_mikrotik').val();
	password_mikrotik = $('#password_mikrotik').val();

	nama = $('#nama').val();
	ip = $('#ip').val();
	port = $('#port').val();
	secret = $('#secret').val();
if(nama == '' || ip == '' || port == '' || secret == ''){

	return false;
}

form_data = {
	nama : nama, 
	ip : ip, 
	port : port, 
	secret : secret, 
	id : '{{ $nas->id }}',
	user_mikrotik : user_mikrotik,
	password_mikrotik : password_mikrotik
}

$.ajax({
	url : '{{ URL::to("nas/update") }}',
	data : form_data,
	type : 'post',
	error : function(err){
		alert('error! terjadi kesalahan pada sisi server!');
	},
	success:function(ok){
		alert('saved');
		window.location.reload();
	}
})



})




</script>