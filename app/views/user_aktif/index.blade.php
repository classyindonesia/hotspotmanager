@extends('template.index')
@section('main')



<span class='label label-success pull-right ' style='margin-left: 1em;'>
 


	Time Refresh : <input type='text' id='time_refresh'   @if(Session::has('time_refresh')) value='{{ Session::get("time_refresh") }}' @else value='10' @endif style='color: black;width:30px;font-size : 10px;'  />
  <i id='tambah' style='cursor:pointer' class='fa fa-plus-square'></i>  
  <i id='kurangi' style='cursor:pointer' class='fa fa-minus-square'></i>  
</span>


 



 <script>
 $(document).ready(function(){
 setInterval(function(){cache_clear()}, $('#time_refresh').val() * 1000);
 });
 function cache_clear()
{
 window.location.reload(true);
}

     $('#time_refresh').keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
            a.push(i);
            a.push(8);
            if (!(a.indexOf(k)>=0))
                e.preventDefault();
            });



$('#time_refresh').blur(function(){
	waktu = $('#time_refresh').val();
	waktu = parseInt(waktu);

	$.ajax({
		url : '{{ URL::route("user_aktif_update_time_refresh") }}',
		type : 'post',
		data : { time_refresh : waktu},
		error : function(err){
			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
			//window.location.reload();
			$('#time_refresh').val(waktu);
		}
	})

})

$('#time_refresh').keyup(function(){
	waktu = $('#time_refresh').val();
	waktu = parseInt(waktu);

	$.ajax({
		url : '{{ URL::route("user_aktif_update_time_refresh") }}',
		type : 'post',
		data : { time_refresh : waktu},
		error : function(err){
			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
			//window.location.reload();
			$('#time_refresh').val(waktu);
		}
	})

})


$('#tambah').click(function(){
	waktu = $('#time_refresh').val();
	waktu = parseInt(waktu);

$.ajax({
	url : '{{ URL::route("user_aktif_update_time_refresh") }}',
	type : 'post',
	data : { time_refresh : waktu + 1},
	error : function(err){
		alert('error! terjadi kesalahan pada sisi server!');
	},
	success:function(ok){
		//window.location.reload();
		$('#time_refresh').val(waktu+1);
	}
})

})


$('#kurangi').click(function(){
	waktu = $('#time_refresh').val();

	if(waktu == 1){
		return false;
	}
	waktu = parseInt(waktu);

$.ajax({
	url : '{{ URL::route("user_aktif_update_time_refresh") }}',
	type : 'post',
	data : { time_refresh : waktu - 1},
	error : function(err){
		alert('error! terjadi kesalahan pada sisi server!');
	},
	success:function(ok){
		//window.location.reload();
		$('#time_refresh').val(waktu-1);
	}
})

})

</script>  

  
<h3>User Online : {{ count($user_aktif) }}</h3>
 
<div class="col-md-12" style="margin-left:0">
<table width='100%'>
	<tr  class="alert alert-success" style='font-weight:bold;border-top:1px solid #ccc;border-bottom:1px solid #ccc;'>
		<td width='5%'>No.</td>
		<td>Username</td>
		<td width='15%'> MAC Address</td>
  		<td width='10%'>IP</td>
 		<td width='10%'>data Rx</td>
 		<td width='10%'>data Tx</td>
 		<td width='10%'>data total</td>
 		<td width='5%'>action</td>
	</tr>
	<?php $no=1; ?>
@foreach($user_aktif as $list) 
	<tr style='border-top:1px solid #ccc;border-bottom:1px solid #ccc;'>
		<td>{{ $no }}</td>
		<td>{{ $list->username }}</td>
		<td> {{ $list->callingstationid }} </td>
 		<td> {{ $list->framedipaddress }} </td>
		<td> {{ Fungsi::size($list->acctoutputoctets) }} </td>
		<td> {{ Fungsi::size($list->acctinputoctets) }} </td>
		<td> {{ Fungsi::size($list->acctoutputoctets+$list->acctinputoctets) }} </td>
		<td align='center'>@include('user_aktif.action.kick')</td>
	</tr>
	<?php $no++; ?>
@endforeach
</table>
</div>


@stop