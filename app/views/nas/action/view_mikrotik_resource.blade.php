<i data-toggle='tooltip' title='view resource mikrotik' class='fa fa-credit-card' id='view_resource{{ $list->id }}' style='cursor:pointer;'></i>
<script type="text/javascript">
$('#view_resource{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::to("nas/mikrotik_resource/".$list->id) }}')

})
</script>

