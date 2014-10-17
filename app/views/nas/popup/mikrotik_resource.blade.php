<h3>Mikrotik Resource</h3>

 <?php 

$API = new routeros_api();

$API->debug = false;

if ($API->connect($nas->nasname, $nas->user_mikrotik, $nas->password_mikrotik)) {

   $API->write('/system/resource/getall');

   $READ = $API->read(false);
   $ok = $API->parse_response($READ);
?>
 
@foreach($ok as  $list)


<table class="table table-bordered table-hover">
    <tr>
      <td>uptime</td>
      <td>{{ $list['uptime'] }}</td>
    </tr>

    <tr>
      <td>version</td>
      <td>{{ $list['version'] }}</td>
    </tr>

 
    <tr>
      <td>free-memory</td>
      <td>{{ Fungsi::size($list['free-memory']) }}</td>
    </tr>


    <tr>
      <td>total-memory</td>
      <td>{{ Fungsi::size($list['total-memory']) }}</td>
    </tr>


    <tr>
      <td>cpu-count</td>
      <td>{{ $list['cpu-count'] }} </td>
    </tr>


    <tr>
      <td>cpu-load</td>
      <td>{{ $list['cpu-load'] }} </td>
    </tr>

    <tr>
      <td>board-name</td>
      <td>{{ $list['board-name'] }} </td>
    </tr>

 </table>
 
 

@endforeach


<?php
   $API->disconnect();

}

?>