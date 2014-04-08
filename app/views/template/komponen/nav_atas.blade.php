<div class="navbar navbar-inverse">
  <div class="navbar-inner">

 
    <ul class="nav">
      <li @if(isset($home)) class="active" @endif ><a href="{{ URL::to('/') }}">Home</a></li>
      <li @if(isset($user_aktif)) class="active" @endif ><a href="{{ URL::to('user_aktif') }}">User Aktif</a></li>
      <li @if(isset($profile)) class="active" @endif ><a href="{{ URL::to('profile') }}">Profile Template</a></li>
     </ul>


    <ul class="nav pull-right">
      <li><a href="{{ URL::to('logout') }}">logout</a></li>
     </ul>

  </div>
</div>