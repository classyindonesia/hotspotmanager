<script>
function update_variable(value, variable){

	form_data = {
		value : value,
		variable : variable
	}


	$.ajax({
		url : '{{ URL::to("config/update_variable") }}',
		data: form_data,
		type: 'post',
		error: function(err){
			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
			alert('saved');
		}
	});

}


$('#update1').click(function(){
	update_variable($('#var1').val(), 'nama_tempat');
});
 
$('#update2').click(function(){
	update_variable($('#var2').val(), 'alamat');
});

$('#update3').click(function(){
	update_variable($('#var3').val(), 'website');
});

$('#update4').click(function(){
	update_variable($('#var4').val(), 'alamat_email');
});

</script>