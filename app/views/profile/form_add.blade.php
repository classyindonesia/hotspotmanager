<h4>tambah profile template hotspot</h4>
<hr>

<table>

<tr>
	<td class="span2">
		Nama profile
	</td>
	<td>:
		<input type='text' id='nama' placeholder='nama profile...' />
	</td>
</tr>

<tr>
	<td class="span2">
		 Max Upload
	</td>
	<td>:
		<input type='text' id='max_upload'   style="width:40px;" /> k
	</td>
</tr>



<tr>
	<td class="span2">
		 Max Download
	</td>
	<td>:
		<input style="width:40px;" type='text' id='max_download'  /> k
	</td>
</tr>


<tr>
	<td class="span2">
		Max login
	</td>
	<td>:
		<input style="width:30px;"  type='text' id='max_login'  /> 
	</td>
</tr>


<tr>
	<td colspan="2" >
		<button id='tambahkan' class="btn btn-info">tambahkan</button>
	</td>
</tr>

</table>

<script>
jQuery('#max_download').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

jQuery('#max_upload').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('#max_login').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});



$('#tambahkan').click(function(){

	nama = $('#nama').val();
	max_upload = $('#max_upload').val();
	max_download = $('#max_download').val();
	max_login = $('#max_login').val();

	if(nama == '' || max_login == '' || max_download == '' || max_upload == ''){

		alert('semua isian tdk boleh kosong');
		return false;
	}

	form_data = {
		nama : nama,
		max_upload : max_upload,
		max_login : max_login,
		max_download : max_download
	}

	$('#tambahkan').attr('disabled', 'disabled');

	$.ajax({
		url : '{{ URL::to("profile/submit_add") }}',
		type : 'post',
		data : form_data,
		success:function(ok){
			$('#tambahkan').removeAttr('disabled');
			alert('data telah ditambahkan');
			$('#myModal').modal('hide');
			window.location.reload();
		}
	})


})
</script>