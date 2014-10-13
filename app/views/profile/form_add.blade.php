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
	<td>
		 Max Upload
	</td>
	<td><input data-toggle='tooltip' title='(kbps)' class='form-control' type='text' id='max_upload'   style="width:100px;" /> 
	</td>
</tr>



<tr>
	<td>
		 Max Download
	</td>
	<td><input data-toggle='tooltip' title='(kbps)' class='form-control' style="width:100px;" type='text' id='max_download'  /> 
	</td>
</tr>


<tr>
	<td>
		Max login
	</td>
	<td><input class='form-control' style="width:70px;"  type='text' id='max_login'  /> 
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


     $('#max_download').keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
            a.push(i);
            a.push(8);
            if (!(a.indexOf(k)>=0))
                e.preventDefault();
            });

     $('#max_upload').keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
            a.push(i);
            a.push(8);
            if (!(a.indexOf(k)>=0))
                e.preventDefault();
            });
     $('#max_login').keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
            a.push(i);
            a.push(8);
            if (!(a.indexOf(k)>=0))
                e.preventDefault();
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