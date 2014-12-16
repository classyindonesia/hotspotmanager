<button class='btn btn-success pull-right' id='add'> <i class='fa fa-plus-square'></i> create</button>

@include('profile.popup.komponen.nav_atas')


<script type="text/javascript">
 $(document).ready(function(){
	$('#check').addClass('active');
})
 

	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>



<script type="text/javascript">
$('#add').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("profile.add_check_atribut", $profile->id) }}');
})
</script>






<h3>[CHECK] Atribut Profile : {{ $profile->nama }}</h3>


<table class="table table-bordered table-hover">
	<thead>

		<tr>
			<th>No.</th>
			<th>Nama Atribut</th>
			<th>Operator</th>
			<th>Value</th>
			<th width='5%'>Action</th>
		</tr>

	</thead>
	<tbody>
		<?php $no=1; ?>
	@foreach($atribut as $list)
		<tr>
			<td>{{ $no }}</td>
			<td> {{ $list->attribute }} </td>
			<td>{{ $list->op }}</td>
			<td> {{ $list->value }} </td>
			<td>@include('profile.action.popup_list_check')</td>
		</tr>
		<?php $no++; ?>
	@endforeach
	</tbody>
</table>