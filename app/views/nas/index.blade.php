@extends('template.index')
@section('main')


<button class='btn btn-success pull-right' id='add'> <i class='fa fa-plus-square'></i> create</button>
<script type="text/javascript">
$('#add').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::to("nas/add") }}');
})
</script>


@include('nas.list_data')


@stop