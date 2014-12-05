
<i data-toggle='tooltip' title='clear user' class='fa fa-refresh' style='cursor:pointer;' id='clear{{ $list->id }}'></i>
<script type="text/javascript">
$('#clear{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ URL::to("profile/clear_user") }}',
			data : {id : '{{ $list->id }}'},
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				window.location.reload();
			}
		})
	}
})
</script>
