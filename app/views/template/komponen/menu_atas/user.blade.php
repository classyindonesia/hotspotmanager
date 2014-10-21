       <ul class="nav nav-pills">
        <li style='text-align:center;' @if(isset($home)) class="active" @endif ><a href="{{ URL::to('/') }}"> 
        	<i class='fa fa-tachometer'></i> 
        	<br> Main</a>
        </li>
 


 

        <li style='text-align:center;' @if(isset($log_usage)) class="active" @endif >
            <a href="{{ URL::to('log_usage') }}">
             <i class='fa fa-th-list'></i> 
            <br>Usage</a>
        </li> 


        <li style='text-align:center;' @if(isset($obrolan)) class="active" @endif >
            <a href="{{ URL::to('obrolan') }}">
             <i class='fa fa-comments'></i> 
            <br>Obrolan</a>
        </li> 

        <li style='text-align:center;' @if(isset($config_user)) class="active" @endif >
            <a href="{{ URL::to('config_user') }}">
             <i class='fa fa-cogs'></i> 
            <br>Profile</a>
        </li> 


       </ul>
 