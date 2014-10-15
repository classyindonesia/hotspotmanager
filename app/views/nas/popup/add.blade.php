<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
<h3>Add NAS Device</h3>
<hr style='margin:3px;'>

<input data-toggle='tooltip' title='nama' type='text' id="nama" class='form-control' placeholder='Nama...'   />
<br>
<input data-toggle='tooltip' title='ip address' type='text' id="ip" class='form-control' placeholder='IP Address...'   />
<br>
<input data-toggle='tooltip' title='port' type='text' id="port" class='form-control' placeholder='Ports...'   />
<br>

<input data-toggle='tooltip' title='Secret' type='password' id="secret" class='form-control' placeholder='Secret...'   />
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
	nama = $('#nama').val();
	ip = $('#ip').val();
	port = $('#port').val();
	secret = $('#secret').val();
if(nama == '' || ip == '' || port == '' || secret == ''){

	return false;
}

$.ajax({
	url : '{{ URL::to("nas/insert") }}',
	data : {nama : nama, ip : ip, port : port, secret : secret},
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