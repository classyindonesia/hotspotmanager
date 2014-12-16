<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
<h4>[CHECK] Tambah Atribut : {{ $profile->nama }}</h4>
<hr>

<table class='table'>

<tr>
	<td width='col-md-2'>
		Nama atribut
	</td>
	<td><input class='form-control' type='text' id='nama' placeholder='nama atribut...' />
	</td>
</tr>
<tr>
	<td>
		Operator
	</td>
	<td><input class='form-control' type='text' id='operator' placeholder='operator atribut...' />
	</td>
</tr>

<tr>
	<td>
		Value
	</td>
	<td><input class='form-control' type='text' id='value' placeholder='Value...' />
	</td>
</tr>
 

<tr>
	<td colspan="2" >
		<button id='tambahkan' class="btn btn-success"> <i class='fa fa-floppy-o'></i> simpan</button>
		<button id='cancel' class="btn"> <i class='fa fa-times'></i> cancel</button>
	</td>
</tr>

</table>

<script>
/*
$('#nama').keydown(function(e) {

        // alert (e.keyCode);

	if (e.keyCode == 32) {
		return false;
	}
});
 
*/

$('#cancel').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('.modal-body').load('{{ URL::route("profile.view_check_atribut", Request::segment(3)) }}');
})


$('#tambahkan').click(function(){

	nama = $('#nama').val();
	operator = $('#operator').val();
	value = $('#value').val();
 

	if(nama == '' || value == '' || operator == ''){
		return false;
	}

	form_data = {
		nama : nama,
		operator : operator,
		value : value,
		groupname : '{{ $profile->nama }}'
	}

	$('#tambahkan').attr('disabled', 'disabled');

	$.ajax({
		url : '{{ URL::route("profile.submit_add_check_atribut") }}',
		type : 'post',
		data : form_data,
		success:function(ok){
			$('#tambahkan').removeAttr('disabled');
			alert('saved!');
			//$('#myModal').modal('hide');
			$('.modal-body').load('{{ URL::route("profile.view_check_atribut", Request::segment(3)) }}');
			//window.location.reload();
		}
	})


})
</script>