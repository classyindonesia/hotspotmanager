<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<h3>Import Data User</h3>
{{ Form::open(array('route' => 'user_hotspot_do_import', 'files' => true)) }}
 {{ Form::file('userfile') }} <br>

 
{{ Form::select('profile', 
$data, '', 
['id' => 'profile', 'class' => 'form-control', 'data-toggle' => 'tooltip', 'title' => 'profile template']) }}
<br>

 <button class='btn btn-success' id='import' type='submit'> <i class='fa fa-cloud-upload'></i> import</button>
 <a class='btn btn-success' href="{{ URL::to('template_import/user_hotspot.xls') }}"> <i class='fa fa-th-list'></i> template import</a>
{{ Form::close() }}

<script type="text/javascript">
$('#import').click(function(){
	profile = $('#profile').val();
	if(profile == ''){
		return false;
	}	
})


</script>