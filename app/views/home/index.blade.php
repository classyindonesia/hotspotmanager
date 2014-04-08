@extends('template.index')
@section('main')

<h4>list user hotspot </h4>
<hr>

<div class="span8" style="margin-left:0">
<table class="table table-bordered">
	<tr class="alert alert-info">
		<td>ID</td>
		<td>Username</td>
		<td>group</td>
		<td>status</td>
	</tr>
@foreach($userhotspot as $list) 
	<tr>
		<td>{{ $list->id }}</td>
		<td>{{ $list->username }}</td>
		<td>
		@if(count($list->radusergroup) >0) 
			{{ $list->radusergroup->groupname }} 
		 @else 
		 	-
		 @endif
	 </td>
	 <td>
-
	 </td>
	</tr>
@endforeach
</table>
</div>

<div class="pagination span10">
{{ $userhotspot->links() }}	
</div>







@stop