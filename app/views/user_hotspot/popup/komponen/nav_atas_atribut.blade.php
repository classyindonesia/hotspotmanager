<ul class="nav nav-tabs">
  <li role="presentation" id='reply' ><a  href="#">Reply</a></li>
  <li role="presentation" id='check' ><a  href="#">Check</a></li>
 </ul>


<script type="text/javascript">
$('#reply').click(function(){
	$('.modal-body').html('loading...');
	$('.modal-body').load('{{ URL::route("user_hotspot.view_attributes", Request::segment(3)) }}');
	//$('#reply').addClass('active');
	//$('#check').removeClass('active');	
});



$('#check').click(function(){
	$('.modal-body').html('loading...');
	$('.modal-body').load('{{ URL::route("user_hotspot.view_check_attributes", Request::segment(3)) }}');
	//$('#check').addClass('active');
	//$('#reply').removeClass('active');	
});



</script>