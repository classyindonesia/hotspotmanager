<button id='add' class="btn btn-info pull-right"><i class='fa fa-plus-square'></i>  tambah</button>


<script>
$('#add').click(function(){

	 $('#myModal').modal('show');
	 $('.modal-body').load('{{ URL::to("profile/add") }}');
});
</script>