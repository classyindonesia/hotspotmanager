<table class="table table-bordered table-hover">
	<thead>
		<tr class='well'>
			<th style='text-align:center;' width='5%'>No.</th>
			<th> IP Address </th>
			<th style='text-align:center;'  width='10%'> <i class='fa fa-plug'></i> MAC ADDR</th>
			<th style='text-align:center;'  width='20%'> <i class='fa fa-clock'></i> Start</th>
			<th style='text-align:center;'  width='20%'> <i class='fa fa-clock'></i> Stop</th>
			<th style='text-align:center;' width='10%'> <i data-toggle='tooltip' title='total download' class='fa fa-cloud-download'></i> </th>
			<th style='text-align:center;'  width='10%'> <i data-toggle='tooltip' title='total upload' class='fa fa-cloud-upload'></i> </th>
			<th style='text-align:center;'  width='10%'> <i data-toggle='tooltip' title='total data' class='fa fa-database'></i> </th>
 		</tr>
	</thead>
	<tbody>
<?php
$no = $log_usage->getFrom();
?>		
@foreach($log_usage as $list)
		<tr>
			<td style='text-align:center;' > {{ $no }} </td>
			<td> {{ $list->framedipaddress }} </td>
 			<td> {{ $list->callingstationid }} </td>
			<td>  {{ Fungsi::date_to_tgl(date('Y-m-d', strtotime($list->acctstarttime))) }} ({{ date('H:i:s', strtotime($list->acctstarttime)) }}) </td>
			<td>
				@if($list->acctstoptime == NULL)
					<span class='label label-success'>masih aktif</span>
				@else
					  {{ Fungsi::date_to_tgl(date('Y-m-d', strtotime($list->acctstoptime))) }} ({{ date('H:i:s', strtotime($list->acctstoptime)) }}) 
				  @endif

			</td>

			<td> {{ Fungsi::size($list->acctinputoctets) }} </td>
			<td> {{ Fungsi::size($list->acctoutputoctets) }} </td>
			<td> {{ Fungsi::size($list->acctoutputoctets+$list->acctinputoctets) }} </td>
 		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>


{{ $log_usage->links() }}