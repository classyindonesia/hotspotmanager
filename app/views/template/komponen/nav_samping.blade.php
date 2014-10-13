       <ul class="nav nav-pills nav-stacked">
        <li @if(isset($home)) class="active" @endif ><a href="{{ URL::to('/') }}"> <i class='fa fa-tachometer'></i> Main</a></li>
        <li @if(isset($user_hotspot)) class="active" @endif ><a href="{{ URL::to('user_hotspot') }}"> <i class='fa fa-th'></i> User Hotspot</a></li>
        <li @if(isset($user_aktif)) class="active" @endif ><a href="{{ URL::to('user_aktif') }}"> <i class='fa fa-group'></i> User Aktif</a></li>
        <li @if(isset($profile)) class="active" @endif ><a href="{{ URL::to('profile') }}"> <i class='fa fa-th-list'></i> Profile Template</a></li>

      </ul>
 