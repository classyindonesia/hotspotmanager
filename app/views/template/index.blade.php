<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hotspot Manager</title>
 
    {{ HTML::script('assets/js/jquery/jquery.min.js') }}
    {{ HTML::script('assets/js/bootstrap/bootstrap.min.js') }}
    {{ HTML::script('assets/js/bootstrap/modal.js') }}
    {{ HTML::script('assets/js/bootstrap/tooltip.js') }}
 

      {{ HTML::style('assets/css/bootstrap/bootstrap.min.css') }}
      {{-- HTML::style('assets/css/bootstrap/bootstrap-theme.min.css') --}}
      {{ HTML::style('assets/css/font-awesome/css/font-awesome.min.css') }}
       {{ HTML::style('assets/css/custom.css') }}

 
</head>
<body>

<script type="text/javascript">
  $(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
 
  <div class="modal-body">
    <p>loading...</p>
  </div>
 
    </div>
  </div>
</div>
 
  <div class="container" style='margin-top: 55px;'>
  @include('template.komponen.nav_atas')

    <div class='col-md-12' style='border-bottom:1px solid #aaa;margin-bottom:1em;'>
      @include('template.komponen.menu_atas')    
    </div>
    <div class='col-md-12'>
      @yield('main')
    </div>
 


</div> <!-- /container -->


 </body>
</html>
