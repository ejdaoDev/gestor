<?php ?>



<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
       <!--<link rel="icon" type="image/x-icon" href="images/logo2.png" />-->

        <title>Login</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('recursos/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}" rel="stylesheet">

        <!-- Custom styles for this template-->

        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">


    </head>
    
    
    
    <body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-9 col-md-5">
        <div class="card border-0 shadow-lg my-5">
          <div class="card-body p-2">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h2 id="sublogin">Bienvenido</h2>
                </div>
                
                  <div class="form-group">



                                    <form class="form-horizontal" method="POST" action="login"> 
                                        {{csrf_field()}}


                                        

                                       
                                        <div class="form-group">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" >Correo Electronico</label>


                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                
                                            </div>
                                        </div>

                                </div>



                                <div class="form-group">

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" >Contraseña</label>


                                        <input id="password" type="password" class="form-control" name="password" required>

                                        

                                    </div>
                                     @if(Session::has('nologueado'))
                                                <span class="help-block">
                                                    <strong>{{Session::get('nologueado')}}</strong>
                                                </span>
                                                @endif
                                     @if(Session::has('inactivo'))
                                                <span class="help-block">
                                                    <strong style="color: red;">{{Session::get('inactivo')}}</strong>
                                                </span>
                                                @endif
                                </div>




                              <!--  <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                                    </div>
                                </div> -->



                                <button type="submit" class="btn btn-primary btn-user btn-block">Acceder</button>

                                </form>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

    

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>


</html>
