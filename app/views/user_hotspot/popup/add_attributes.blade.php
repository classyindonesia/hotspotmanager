 	<legend>Tambah Atribut [Reply] </legend>

	<div class="form-group">
		<label for="">Attribute</label>
		<input type="text" class="form-control" id="attribute" placeholder="attribute...">
	</div>

	<div class="form-group">
		<label for="">OP</label>
		<input type="text" class="form-control" id="op" placeholder="op...">
	</div>
	<div class="form-group">
		<label for="">Value</label>
		<input type="text" class="form-control" id="value" placeholder="value...">
	</div>	

	<button type="submit" id='submit' class="btn btn-success"> <i class='fa fa-floppy-o'></i> save</button>

	<button  id='cancel' class="btn btn-danger"> <i class='fa fa-times'></i> cancel</button>

 

<script type="text/javascript">
$('#cancel').click(function(){
	$('.modal-body').html('loading...');
	$('.modal-body').load('{{ URL::route("user_hotspot.view_attributes", Request::segment(3)) }}');
});


$('#submit').click(function(){
	attribute = $('#attribute').val();
	op = $('#op').val();
	value = $('#value').val();
if(attribute == '' || op == '' || value == ''){
	alert('isian tdk boleh ada yg kosong!');
	return false;
}

form_data = {
	username : '{{ Request::segment(3) }}',
	attribute : attribute,
	op : op,
	value : value
}

$('#submit').attr('disabled', 'disabled');

$.ajax({
	url : '{{ URL::route("insert_user_attributes") }}',
	data : form_data,
	type : 'post',
	error: function(err){
		alert('terjadi kesalahan pada sisi server!');
		$('#submit').removeAttr('disabled');
	},
	success:function(ok){
		$('.modal-body').load('{{ URL::route("user_hotspot.view_attributes", Request::segment(3)) }}');
	}

})



})


</script>