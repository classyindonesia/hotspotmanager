@extends('template.index')
@section('main')


@include('profile.add')
<h4>profile template</h4>
<hr>
<div class="span7">
<table class="table table-bordered">
	<tr class="alert-info">
		<td width='5%'>No.</td>
		<td>Nama Profil</td>
		<td width='15%'>max download</td>
		<td width='15%'>max upload</td>
		<td width='10%'>max login</td>
		<td width='10%'>action</td>
	</tr>
<?php $no=$profile->getFrom(); ?>
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
		<td> @include('profile.action') </td>
	</tr>
<?php $no++; ?>
@endforeach


</table>
</div>




@stop