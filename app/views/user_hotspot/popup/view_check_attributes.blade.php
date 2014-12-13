@include('user_hotspot.popup.komponen.nav_atas_atribut')

<script type="text/javascript">
$(document).ready(function(){
	$('#check').addClass('active');
})
</script>



<hr style='margin:3px'>
<button class='btn btn-success pull-right' id='add'> <i class='fa fa-plus-square'></i> create</button>
<script type="text/javascript">
$('#add').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("user_hotspot.add_user_check_attributes", Request::segment(3)) }}');
})
</script>



username : {{ Request::segment(3) }}
<hr>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5%'>no</th>
			<th>Attribute</th>
			<th>op</th>
			<th>value</th>
			<th width='5%'>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
@foreach($radcheck as $list)		
		<tr>
			<td>{{ $no }}</td>
			<td> {{ $list->attribute }} </td>
			<td> {{ $list->op }} </td>
			<td> {{ $list->value }} </td>
			<td>@include('user_hotspot.action.edit_check_attributes') ||
				@include('user_hotspot.action.del_check_attributes')</td>
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>