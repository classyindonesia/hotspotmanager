<div class='col-md-6'>
	<table class="table">
			<tr>
				<td>User Name</td>
				<td width='10%'> <span class='label label-success'>{{  Auth::user()->username }}</span> </td>
			</tr>

			<tr>
				<td>Total Data</td>
				<td width='10%'> <span class='label label-success'>
<?php
$dtr = Radius_Radacct::whereUsername(Auth::user()->username)->sum('acctinputoctets');
$dtx = Radius_Radacct::whereUsername(Auth::user()->username)->sum('acctoutputoctets');

?>

					{{ Fungsi::size($dtx+$dtr) }}</span> 
				</td>
			</tr>

			<tr>
				<td>IP Address</td>
				<td width='10%'> <span class='label label-success'>{{ request::getClientIp() }}</span> </td>
			</tr>



	</table>
</div>