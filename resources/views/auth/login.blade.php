<!DOCTYPE html>

<html lang="es">

<head>
  <title>Proyecto WebMail</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
  <!-- Muestra los errrores del login. -->
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="container" style="margin-top:40px">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong> Proyecto Web Mail </strong>
          </div>
          <div class="panel-body">
            <form action="/auth/login" method="POST">
              {!! csrf_field() !!}
              <fieldset>
                <div class="row">
                  <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span> 
                        <input class="form-control" placeholder="Email" name="email" type="email" id="loginname" autofocus required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input class="form-control" placeholder="Contraseña" name="password" type="password" id="password" value="" required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Iniciar Sesión" >
                    </div>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
          <div class="panel-footer">
            No tienes cuenta! <a href="#" onClick="location.href='register'"> Registrate aquí </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/js/jquery.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>	