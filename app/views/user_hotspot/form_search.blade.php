<table class='pull-right' style='margin-right:5px'>
<tr>
	<td><input value="{{ Session::get('pencarian') }}" type='text' placeholder='search by name or username...' id='pencarian' class='form-control ' style='width:200px;' /></td>
	<td>
		<button id='cari' class='btn btn-success'> <i class='fa fa-search'></i> </button>
		@if(Session::has('pencarian'))
			<button id='reset' class='btn btn-danger'> <i class='fa fa-times'></i> </button>
		@endif
	</td>
</tr>
</table>



<script type="text/javascript">
$(document).ready(function(){
	$('#pencarian').focus();
});


function pencarian_user(){
	pencarian  = $('#pencarian').val();
	if(pencarian == ''){
		return false;
	}

	$.ajax({
		url : '{{ URL::route("user_hotspot_search") }}',
		data : {pencarian : pencarian},
		type : 'post',
		error : function(err){
			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
			window.location.reload();
		}
	})	
}

$('#cari').click(function(){
	pencarian_user();
});


$('#reset').click(function(){
		pencarian  = $('#pencarian').val();
	if(pencarian == ''){
		return false;
	}

	$.ajax({
		url : '{{ URL::route("user_hotspot_search") }}',
		data : {reset : 1},
		type : 'post',
		error : function(err){
			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
			window.location.reload();
		}
	})	 

});


$("#pencarian").keypress(function(e) {
    if(e.which == 13) {
       pencarian_user();
    }
});

</script>