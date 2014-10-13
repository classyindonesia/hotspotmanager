@extends('template.index')
@section('main')


  
<h4>list user online </h4>
<hr>
 
<div class="col-md-12" style="margin-left:0">
<table class="table table-bordered">
	<tr class="alert alert-success" style='font-weight:bold;'>
		<td width='5%'>No.</td>
		<td>Username</td>
		<td width='15%'> MAC Address</td>
  		<td width='10%'>IP</td>
 		<td width='10%'>data Rx</td>
 		<td width='10%'>data Tx</td>
 		<td width='10%'>data total</td>
 		<td width='5%'>action</td>
	</tr>
	<?php $no=1; ?>
@foreach(Radius_Radacct::where('acctstoptime', '=', NULL)->get() as $list) 
	<tr>
		<td>{{ $no }}</td>
		<td>{{ $list->username }}</td>
		<td> {{ $list->callingstationid }} </td>
 		<td> {{ $list->framedipaddress }} </td>
		<td> {{ Fungsi::size($list->acctoutputoctets) }} </td>
		<td> {{ Fungsi::size($list->acctinputoctets) }} </td>
		<td> {{ Fungsi::size($list->acctoutputoctets+$list->acctinputoctets) }} </td>
		<td align='center'>@include('user_aktif.action.kick')</td>
	</tr>
	<?php $no++; ?>
@endforeach
</table>
</div>


@stop