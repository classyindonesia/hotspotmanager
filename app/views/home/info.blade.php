<div class='col-md-6'>
	<table class="table">
 

			<tr>
				<td> 
					<i style='font-size: 30px;' data-toggle='tooltip' title='alamat' class='fa fa-location-arrow'></i> </td>
				<td> {{ Fungsi::setup_variable('alamat') }}  </td>				
  			</tr>

			<tr>
				<td> 
					<i style='font-size: 30px;' data-toggle='tooltip' title='website' class='fa fa-desktop'></i> </td>
				<td> <a href="http://{{ Fungsi::setup_variable('website') }}" target='__blank'>{{ Fungsi::setup_variable('website') }}</a>   </td>				
  			</tr>

			<tr>
				<td> 
					<i style='font-size: 30px;' data-toggle='tooltip' title='alamat email' class='fa fa-at'></i> </td>
				<td> {{ Fungsi::setup_variable('alamat_email') }}  </td>				
  			</tr>





	</table>
</div>