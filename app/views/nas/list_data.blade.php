<h3>NAS Device</h3>

<table class="table table-bordered table-hover">
	<thead class='alert-success'>
		<tr>
			<th width='5%'>No.</th>
			<th>Nama</th>
			<th>IP</th>
			<th width='5%'>Port</th>
			<th width='10%'>Data Tx</th>
			<th width='10%'>Data Rx</th>
			<th width='10%'>Data Total</th>
			<th width='8%'>Action</th>
		</tr>
	</thead>
	<tbody>
<?php $no=$nas->getFrom(); ?>
@foreach($nas as $list)
		<tr>
			<td>{{ $no }}</td>
			<td>{{ $list->shortname }}</td>
			<td>{{ $list->nasname }}</td>
			<td>{{ $list->ports }}</td>
			<td> 
				<?php
				$dtx = Radius_Radacct::where('nasipaddress', '=', $list->nasname)->sum('acctinputoctets');
				 echo Fungsi::size($dtx);
				 ?>
			  </td>
			<td>
				<?php
				$drx = Radius_Radacct::where('nasipaddress', '=', $list->nasname)->sum('acctoutputoctets');
				 echo Fungsi::size($drx);
				 ?>
			</td>
			<td>{{  Fungsi::size($dtx+$drx) }}</td>	
			<td> @include('nas.action') </td>			
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>

{{ $nas->links() }}