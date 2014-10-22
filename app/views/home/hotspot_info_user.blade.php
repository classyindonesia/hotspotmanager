<div class='col-md-6'>
	<table class="table">
			<tr>
				<td>User Name</td>
				<td width='10%'> <span class='label label-success'>{{  Auth::user()->username }}</span> </td>
			</tr>

			<tr>
				<td>Total Data</td>
				<td width='10%'> <span class='label label-success'>
					{{ Radius_Radacct::where('acctstoptime', '=', NULL)->count() }}</span> 
				</td>
			</tr>

			<tr>
				<td>IP Address</td>
				<td width='10%'> <span class='label label-success'>{{ request::getClientIp() }}</span> </td>
			</tr>



	</table>
</div>