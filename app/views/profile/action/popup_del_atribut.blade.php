
<i class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>
<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ URL::to("profile/del_atribut") }}',
			data : {id : '{{ $list->id }}'},
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				//window.location.reload();
				$('.modal-body').load('{{ URL::to("profile/view_atribut/".Request::segment(3)) }}');
			}
		})
	}
})
</script>
