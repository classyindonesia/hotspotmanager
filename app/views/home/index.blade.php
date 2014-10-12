@extends('template.index')
@section('main')

<h1> <i class='fa fa-signal'></i> M3K Hotspot</h1>
<hr>

<div class='col-md-6'>
	<table class="table">
			<tr>
				<td>User Hotspot</td>
				<td width='10%'> <span class='label label-success'>{{ Radius_Radcheck::count() }}</span> </td>
			</tr>

			<tr>
				<td>User Online</td>
				<td width='10%'> <span class='label label-success'>{{ Radius_Radacct::where('acctstoptime', '=', NULL)->count() }}</span> </td>
			</tr>

	</table>
</div>
 
@stop