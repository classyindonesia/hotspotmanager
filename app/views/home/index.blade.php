@extends('template.index')
@section('main')

<h1> <i class='fa fa-signal'></i> M3K Hotspot</h1>
<hr>

<div class='col-md-4'>
	<table class="table table-bordered table-hover">
			<tr>
				<td>Jumlah user Hotspot</td>
				<td>{{ Radius_Radcheck::count() }}</td>
			</tr>
	</table>
</div>
 

@stop