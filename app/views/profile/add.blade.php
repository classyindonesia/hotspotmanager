<button id='add' class="btn btn-info pull-right"><i class='icon-plus icon-white'></i>  add template</button>


<script>
$('#add').click(function(){

	 $('#myModal').modal('show');
	 $('.modal-body').load('{{ URL::to("profile/add") }}');
});
</script>