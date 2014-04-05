@extends('template.index')
@section('main')

list user hotspot
<hr>

<div class="span8">
<table class="table table-bordered">
	<tr class="alert alert-info">
		<td>ID</td>
		<td>Username</td>
		<td>group</td>
		<td>status</td>
	</tr>
@foreach(Radius_Radcheck::with('radusergroup')->get() as $list) 
	<tr>
		<td>{{ $list->id }}</td>
		<td>{{ $list->username }}</td>
		<td>
		@if(count($list->radusergroup) >0) 
			{{ $list->radusergroup->groupname }} 
		 @else 
		 	-
		 @endif
	 </td>
	 <td>
-
	 </td>
	</tr>
@endforeach
</table>
</div>




<div class="span10">
<hr>
list user online
<hr>
	
</div>

 
<div class="span8">
<table class="table table-bordered">
	<tr class="alert alert-info">
		<td>No.</td>
		<td>Username</td>
 		<td>IP</td>
 		<td>kick</td>
	</tr>
	<?php $no=1; ?>
@foreach(Radius_Radacct::where('acctstoptime', '=', NULL)->get() as $list) 
	<tr>
		<td>{{ $no }}</td>
		<td>{{ $list->username }}</td>
		<td> {{ $list->framedipaddress }} </td>
		<td>
			@include('action.kick')
		</td>
	</tr>
	<?php $no++; ?>
@endforeach
</table>
</div>



@stop