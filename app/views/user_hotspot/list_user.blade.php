<h3>List User Hotspot </h3>
<hr style='margin: 2px;'>

<div class="col-md-12" style="margin-left:0">
<table class="table table-bordered table-hover">
	<thead class='alert-success'>
	<tr>
		<th width='5%' style='text-align:center;'>No</th>
		<th width='15%'>Username</th>
		<th>Nama</th>
		<th width='200px'>Profile</th>
		<th width='10%'>Usage</th>
		<th width='100px'>action</th>
	</tr>
	</thead>
	<tbody>	
	<?php $no=$userhotspot->getFrom(); ?>
@foreach($userhotspot as $list) 

		@if(count($list->radusergroup) >0) 
			 
		<?php
			$group = $list->radusergroup->groupname;
			$cek_group = Radius_Radgroupreply::where('groupname', '=', $list->radusergroup->groupname)->first();
		?>

		 @else 
		 	<?php $cek_group = []; $group='-'; ?>
		 @endif
	<tr>
		<td align='center'>{{ $no }}</td>
		<td>{{ $list->username }}</td>
		<td>{{ $list->nama }}</td>
		<td>
			@if(count($cek_group)<=0)
				<span data-toggle='tooltip' title='profile ini tdk memiliki attribute sama sekali' class='label label-danger'>{{ $group }}</span>
			@else
				{{ $group }}
			@endif
	 </td>
	 <td>
		<?php
		$drx = Radius_Radacct::where('username', '=', $list->username)->sum('acctoutputoctets');
		$dtx = Radius_Radacct::where('username', '=', $list->username)->sum('acctinputoctets');
		 echo Fungsi::size($drx+$dtx);
		 ?>
	 </td>
	 <td>
		@include('user_hotspot.action')
	 </td>
	</tr>

	<?php $no++ ?>
@endforeach
</tbody>	
</table>
</div>

<div class="pagination span10">
{{ $userhotspot->links() }}	
</div>