
<button style='margin-left: 4px;' class='btn btn-info pull-right' id='import_blokir'> 
	<i class='fa fa-cloud-upload'></i> import blokir</button>
<script type="text/javascript">
$('#import_blokir').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("user_hotspot.import_blokir") }}');
})
</script>
