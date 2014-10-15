<i style='cursor:pointer;' data-toggle='tooltip' title='test radius' id='test{{ $list->id }}' class="fa fa-plug"></i>
<script type="text/javascript">
$('#test{{ $list->id }}').click(function(){
	$.ajax({
		url : '{{ URL::to("user_hotspot/test_radius") }}',
		data : {username : '{{ $list->username }}'},
		type : 'post',
		error : function(err){
			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
			$('#myModal').modal('show');
			$('.modal-body').html(ok);
		}
	})
})
</script>