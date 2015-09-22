@extends('template.index')
@section('main')

<script src="/socket.io/socket.io.js"></script>

<script type="text/javascript">// <![CDATA[
            var socket = io.connect('http://{{ $_ENV["APP_HOST_OBROLAN"] }}:5000/');
            socket.on('chat', function (data) {
                 socket.emit('pesan: ', data);
                 //$('#pesan').append(data+'<br>');
                 //alert(data);
                 //data = id

var content;
$.get('{{ URL::to("obrolan/show") }}/'+data, function(data){
    content= data;
    $('#list_pesan').prepend(content);
});


            });
 
// ]]></script>







<div class='col-md-12'>
	@include('obrolan.tulis_pesan')
</div>


<div class='col-md-12'>
    
	@include('obrolan.list_pesan')
</div>



@stop