<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
<h4>tambah profile template hotspot</h4>
<hr>

<table class='table'>

<tr>
	<td width='col-md-2'>
		Nama profile
	</td>
	<td><input class='form-control' type='text' id='nama' placeholder='nama profile...' />
	</td>
</tr>

 

<tr>
	<td colspan="2" >
		<button id='tambahkan' class="btn btn-success"> <i class='fa fa-floppy-o'></i> simpan</button>
	</td>
</tr>

</table>

<script>

$('#nama').keydown(function(e) {

        // alert (e.keyCode);

	if (e.keyCode == 32) {
		return false;
	}
});

 
 

 


$('#tambahkan').click(function(){

	nama = $('#nama').val();
 

	if(nama == ''){
		return false;
	}

	form_data = {
		nama : nama
	}

	$('#tambahkan').attr('disabled', 'disabled');

	$.ajax({
		url : '{{ URL::to("profile/submit_add") }}',
		type : 'post',
		data : form_data,
		success:function(ok){
			$('#tambahkan').removeAttr('disabled');
			alert('saved!');
			$('#myModal').modal('hide');
			window.location.reload();
		}
	})


})
</script>