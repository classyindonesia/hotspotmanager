
<button style='margin-left: 4px;' class='btn btn-success pull-right' id='import'> <i class='fa fa-cloud-upload'></i> import</button>
<script type="text/javascript">
$('#import').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("user_hotspot_import") }}');
})
</script>
