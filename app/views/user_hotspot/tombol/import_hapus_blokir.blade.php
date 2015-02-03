
<button style='margin-left: 4px;' class='btn btn-info pull-right' id='import_hapus_blokir'> 
	<i class='fa fa-cloud-upload'></i> import hapus blokir</button>
<script type="text/javascript">
$('#import_hapus_blokir').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("user_hotspot.import_hapus_blokir") }}');
})
</script>
