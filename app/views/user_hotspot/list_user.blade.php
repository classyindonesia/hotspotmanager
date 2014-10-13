<h4>list user hotspot </h4>
<hr>

<div class="col-md-12" style="margin-left:0">
<table class="table table-bordered">
	<tr class="alert alert-success">
		<td width='5%'>No</td>
		<td>Username</td>
		<td>group</td>
		<td width='5%'>action</td>
	</tr>
	<?php $no=$userhotspot->getFrom(); ?>
@foreach($userhotspot as $list) 
	<tr>
		<td>{{ $no }}</td>
		<td>{{ $list->username }}</td>
		<td>
		@if(count($list->radusergroup) >0) 
			{{ $list->radusergroup->groupname }} 
		 @else 
		 	-
		 @endif
	 </td>
	 <td>
		@include('user_hotspot.action')
	 </td>
	</tr>
	<?php $no++ ?>
@endforeach
</table>
</div>

<div class="pagination span10">
{{ $userhotspot->links() }}	
</div>