
<i class='fa fa-times' style='cursor:pointer;' id='del_attr{{ $list->id }}'></i>
<script type="text/javascript">
$('#del_attr{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ URL::route("del_user_check_attributes") }}',
			data : {id : '{{ $list->id }}'},
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				//window.location.reload();
				$('.modal-body').load('{{ URL::route("user_hotspot.view_attributes", Request::segment(3)) }}');
			}
		})
	}
})
</script>
