
<button class='btn btn-primary pull-right' id='add'> <i class='fa fa-plus-square'></i> create</button>
<script type="text/javascript">
$('#add').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::to("user_hotspot/add") }}');
})
</script>
