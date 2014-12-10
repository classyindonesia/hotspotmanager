
  <i data-toggle='tooltip' title="user's attributes" style='cursor:pointer;' id='attr{{ $list->id }}' class='fa fa-th-list'></i> 
<script type="text/javascript">
$('#attr{{ $list->id }}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("user_hotspot.view_attributes", $list->username) }}');
});
</script>
