       <ul class="nav nav-pills">
        <li style='text-align:center;' @if(isset($home)) class="active" @endif ><a href="{{ URL::to('/') }}"> 
        	<i class='fa fa-tachometer'></i> 
        	<br> Main</a>
        </li>
        <li style='text-align:center;' @if(isset($user_hotspot)) class="active" @endif >
        	<a href="{{ URL::to('user_hotspot') }}"> 
        		<i class='fa fa-th'></i> <br> User</a>
        </li>
        <li style='text-align:center;' @if(isset($user_aktif)) class="active" @endif >
        	<a href="{{ URL::to('user_aktif') }}"> 
        		<i class='fa fa-group'></i> 
        		<br>
        		User Aktif</a>
        </li>
        <li style='text-align:center;' @if(isset($profile)) class="active" @endif >
        	<a href="{{ URL::to('profile') }}"> 
        		<i class='fa fa-th-list'></i>
        		<br> 
        		Profiles</a>
        </li>
        <li style='text-align:center;' @if(isset($nas)) class="active" @endif >
            <a href="{{ URL::to('nas') }}">
             <i class='fa fa-tasks'></i> 
            <br> NAS</a>
        </li>


        <li style='text-align:center;' @if(isset($config)) class="active" @endif >
        	<a href="{{ URL::to('config') }}">
        	 <i class='fa fa-wrench'></i> 
        	<br> Config</a>
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
            <br>My Profile</a>
        </li>   

      </ul>
 