@extends('template.index')
@section('main')

<span class='label label-success pull-right'>User online : {{ count($user_aktif) }}</span>

  
<h3>User Online </h3>
 
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
@foreach($user_aktif as $list) 
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