<i data-toggle='tooltip' title='view attribute' class='fa fa-credit-card' id='view_atribut{{ $list->id }}' style='cursor:pointer;'></i>
<script type="text/javascript">
$('#view_atribut{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::to("profile/view_atribut/".$list->id) }}')

})
</script>

