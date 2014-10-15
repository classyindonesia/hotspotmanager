<i style='cursor:pointer;' data-toggle='tooltip' title='test radius' id='test{{ $list->id }}' class="fa fa-plug"></i>
<i style='display:none;'  id='loading_test{{ $list->id }}' class="fa fa-spinner fa-spin"></i>

<script type="text/javascript">
$('#test{{ $list->id }}').click(function(){
$('#loading_test{{ $list->id }}').fadeIn();
$('#test{{ $list->id }}').hide();
	$.ajax({
		url : '{{ URL::to("user_hotspot/test_radius") }}',
		data : {username : '{{ $list->username }}'},
		type : 'post',
		error : function(err){
$('#loading_test{{ $list->id }}').hide();
$('#test{{ $list->id }}').fadeIn();

			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
$('#loading_test{{ $list->id }}').hide();
$('#test{{ $list->id }}').fadeIn();			
			$('#myModal').modal('show');
			$('.modal-body').html(ok);
		}
	})
})
</script>