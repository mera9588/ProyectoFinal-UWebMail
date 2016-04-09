<!DOCTYPE html>

<html lang="es">

<head>
  <title>Registro de Usuario</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
  <div class="container" style="margin-top:40px">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong> Registro de Usuario </strong>
          </div>
          <div class="panel-body">
            <form method="POST" action="/auth/register">
              {!! csrf_field() !!}
              <fieldset>
                <div class="row">
                  <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span> 
                        <input class="form-control" placeholder="Nombre" name="name" type="text" value="{{ old('name') }}" autofocus required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span> 
                        <input class="form-control" placeholder="Apellido" name="lastname" type="text" value="{{ old('lastname') }}" required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span> 
                        <input class="form-control" placeholder="Email" name="email" type="email" value="{{ old('email') }}" required/>
                      </div>
                    </div>  
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input class="form-control" placeholder="Contraseña" name="password" type="password" required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation" type="password" required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Registrarse" class="btn btn-primary btn-block"/>
                    </div>
                    <div>
                      <input type="button" class="btn btn-secundary pull-rigth btn-block" value="Cancelar" onClick="location.href='login'">
                    </div>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>  
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
</html>	