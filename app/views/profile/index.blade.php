@extends('template.index')
@section('main')


@include('profile.add')
<h4>profile template</h4>
<hr>
<div class="span7">
<table class="table table-bordered">
	<tr class="alert-info">
		<td>No.</td>
		<td>Nama Profil</td>
		<td>max download</td>
		<td>max upload</td>
		<td>max login</td>
		<td>action</td>
	</tr>
<?php $no=1; ?>
@foreach($profile as $list)

<?php $max_login = Radius_Radgroupreply::where('groupname', '=', $list->groupname)
		->where('attribute', '=', 'Simultaneous-Use')
		->first();
 ?>
	<tr>
		<td>{{ $no }}</td>
		<td>{{ $list->groupname }}</td>
		<?php $val = explode("/", $list->value); ?>
		<td>{{ $val[0] }}</td>
		<td>{{ $val[1] }}</td>
		<td>{{ $max_login->value }}</td>
		<td> @include('profile.action.edit') </td>
	</tr>
<?php $no++; ?>
@endforeach


</table>
</div>




@stop