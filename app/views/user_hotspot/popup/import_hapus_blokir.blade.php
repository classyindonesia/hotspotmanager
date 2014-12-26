<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<h3>Import Hapus Blokir User</h3>
{{ Form::open(array('route' => 'user_hotspot.do_import_hapus_blokir', 'files' => true)) }}
 {{ Form::file('userfile') }} <br>

 

 <button class='btn btn-success' id='import' type='submit'> <i class='fa fa-cloud-upload'></i> import</button>
 <a class='btn btn-success' href="{{ URL::to('template_import/hapus_blokir_user.xls') }}"> 
 	<i class='fa fa-th-list'></i> template import</a>
{{ Form::close() }}

 