<h3>Profile Template</h3>
 <div class="span7">
<table class="table table-bordered">
	<tr class="alert-success">
		<td width='5%'>No.</td>
		<td>Nama Profil</td>
		<td width='5%'>Atribut</td>
		<td width='5%'>User</td>
 		<td align='center' width='7%'>action</td>
	</tr>
<?php $no=$profile->getFrom(); ?>
@foreach($profile as $list)
	<tr>
		<td>{{ $no }}</td>
		<td>{{ $list->nama }}</td>
		<td align='center'>{{ count($list->atribut) }}</td>
		<td align='center'>{{ count($list->radusergroup) }}</td>

		<td align='center'> @include('profile.action') </td>
	</tr>
<?php $no++; ?>
@endforeach


</table>
</div>