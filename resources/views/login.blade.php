<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  </head>
  <body class="bg-info">

  <div class="container">
    <div class="col-xs-12">
      <br><br><br><br>
      <div class="text-center">
            <img src="{{ asset('imagenes/user.png') }}" alt="">
      </div>
      <br>
      <form action="" method="POST">
            {{csrf_field()}}
            <div class="input-group col-xs-12 col-md-4 col-md-offset-4">
              <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control" placeholder="Usuario" aria-describedby="basic-addon1" name="nit">
            </div>
            <br>
            <div class="input-group col-xs-12 col-md-4 col-md-offset-4">
              <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1" name="password">
            </div>
            <br>
            <div class="input-group col-xs-12 col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-success btn-block btn-lg">Ingresar</button>
            </div>
            <br>
            <div class="col-xs-12 col-md-4 col-md-offset-4">
              <a href="{{ route('password.request') }}">Ha olvidado su contraseña?</a>
            </div>
        </form>
    </div>  
      
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>