 <b> {{ $obrolan->data_user->nama }} </b> : 
  {{ $obrolan->pesan }}

<br>
	<div   style='font-size:9px;color:#ccc;'>
		{{ date('H:i:s', strtotime($obrolan->created_at)) }} WIB 
		( {{ Fungsi::date_to_tgl(date('Y-m-d', strtotime($obrolan->created_at))) }} )

	</div>	  
<hr style='margin:3px;'>