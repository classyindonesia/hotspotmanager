<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{  $_ENV['NAMA_APLIKASI'] }}</title>
 
    {{ HTML::script('assets/js/jquery/jquery.min.js') }}
    {{ HTML::script('assets/js/bootstrap/bootstrap.min.js') }}

      {{ HTML::style('assets/css/bootstrap/bootstrap.min.css') }}
      {{ HTML::style('assets/css/bootstrap/bootstrap-theme.min.css') }}

      {{ HTML::style('assets/css/font-awesome/css/font-awesome.min.css') }}

 

</head>
<body>
   <div class="container">   



        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <center style='font-size:40px;'>  
                        <i class="fa fa-cubes"></i>
                       <i class="fa fa-desktop"></i>
                       <i class="fa fa-signal"></i>

                        </center>
                        
                        <center> <h2>{{ strtoupper($_ENV['NAMA_APLIKASI']) }}</h2> </center>

                        <div style='display:none;' class="panel-title">{{  $_ENV['NAMA_APLIKASI'] }}</div>

                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        {{ Form::open(['url' => 'check_login', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'loginform']) }}    
                                     
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                         <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username...">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password...">
                                    </div>
                                    
 


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button class="btn btn-large btn-primary" type="submit">Sign in</button>
 
                                    </div>
                                </div>


 
                            </form>     



                        </div>                     
                    </div>  

        </div> 

    </div>
 

 </body>
</html>
