<i class='fa fa-pencil-square' id='edit{{ $list->id }}' style='cursor:pointer;'></i>
<script type="text/javascript">
$('#edit{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::to("profile/edit_atribut/".Request::segment(3).'/'.$list->id) }}')

})
</script>

