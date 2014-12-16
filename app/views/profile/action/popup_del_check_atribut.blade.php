
<i class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>
<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ URL::route("profile.del_check_atribut") }}',
			data : {id : '{{ $list->id }}'},
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				//window.location.reload();
				$('.modal-body').load('{{ URL::route("profile.view_check_atribut", Request::segment(3)) }}');
			}
		})
	}
})
</script>
