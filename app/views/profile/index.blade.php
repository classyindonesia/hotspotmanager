@extends('template.index')
@section('main')


@include('profile.add')
<h4>profile template</h4>
<hr>
<div class="span7">
<table class="table table-bordered">
	<tr class="alert-success">
		<td width='5%'>No.</td>
		<td>Nama Profil</td>
		<td width='10%'>Jml User</td>
		<td width='15%'>max download</td>
		<td width='15%'>max upload</td>
		<td width='10%'>max login</td>
		<td width='5%'>action</td>
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
		<td>{{ Radius_Radusergroup::where('groupname', '=', $list->groupname)->count() }}</td>
		<?php $val = explode("/", $list->value); ?>
		<td> 
			@if($val[0] == '0k' || $val[0] == '0')  
			<span class='label label-success'>unlimited</span>
		 @else {{ $val[0] }} @endif
		</td>
		<td>
			@if($val[1] == '0k' || $val[1] == '0')  
			<span class='label label-success'>unlimited</span>
		 @else {{ $val[1] }} @endif
		</td>
		<td>{{ $max_login->value }}</td>
		<td align='center'> @include('profile.action') </td>
	</tr>
<?php $no++; ?>
@endforeach


</table>
</div>




@stop