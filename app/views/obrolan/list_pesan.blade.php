 <hr>
<div id='list_pesan'  style='height:500px; overflow:scroll;overflow-x: hidden;'>

@foreach($list_pesan as $list)
 

	<b>{{ $list->data_user->nama }}</b> : 
	{{ $list->pesan }}
<br>
	<div   style='font-size:9px;color:#ccc;'>
		{{ date('H:i:s', strtotime($list->created_at)) }} WIB 
		( {{ Fungsi::date_to_tgl(date('Y-m-d', strtotime($list->created_at))) }} )

	</div>	
 	<hr style='margin:3px;'>
@endforeach
		{{ $list_pesan->links() }}

</div>