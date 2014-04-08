@extends('template.index')
@section('main')


  
<h4>list user online </h4>
<hr>
 

 
<div class="span8" style="margin-left:0">
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