
  <i data-toggle='tooltip' title="user's credentials" style='cursor:pointer;' id='view{{ $list->id }}' class='fa fa-credit-card'></i> 
<script type="text/javascript">
$('#view{{ $list->id }}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("user_hotspot.view_detail", $list->username) }}');
});
</script>
