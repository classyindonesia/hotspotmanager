       <ul class="nav nav-pills">
        <li style='text-align:center;' @if(isset($home)) class="active" @endif ><a href="{{ URL::to('/') }}"> 
        	<i class='fa fa-tachometer'></i> 
        	<br> Main</a>
        </li>
 

        <li style='text-align:center;' @if(isset($config_user)) class="active" @endif >
            <a href="{{ URL::to('config_user') }}">
             <i class='fa fa-cogs'></i> 
            <br>My Profile</a>
        </li> 
 

      </ul>
 