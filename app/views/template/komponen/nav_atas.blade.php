
<nav class="navbar  navbar-fixed-top" role="navigation" style='background-color:#8dd7e7'>
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a   class="navbar-brand" href="{{ URL::to('/') }}"> <i class='fa fa-signal'></i> M3K Hotspot </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

 
 
<ul class='nav pull-right'>
 <li><a style='font-size:25px;' href="{{ URL::to('logout') }}"><i class="fa fa-power-off"></i></a></li>     
</ul>
 


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>