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
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Navegación</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Correo Web Mail UTN</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
        <form class="navbar-form navbar-left" method="GET" role="search">
          <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar">
          </div>
          <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cuenta<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{'logout'}}">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 sidebar">
    <ul class="nav nav-pills nav-stacked">
      <li class="active"><a href="{{URL::to('emails/create')}}" title="Compose" class="btn btn-compose" role="button">Nuevo</a></li>
      <li><a href="{{URL::to('inbox')}}">Bandeja salida</a></li>
      <li><a href="inbox2.html">Bandeja enviados</a></li>
    </ul>
  </div>

  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 content">
    <div class="panel panel-default">
      <div class="panel-heading">
        Bandeja de Salida
      </div>
    </div>
    <table class="table" id="tbl1">
      <thead>
        <tr>
          <th>Destinatario</th>
          <th>Asunto</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($emails as $emails)
        <tr>
          <td>{{$emails->destinatario}}</td>
          <td>{{$emails->asunto}}</td>
          <td>{{$emails->fecha}}</td>
          <td><a class="btn btn-info" href="{{URL::route('emails.edit',$emails->id)}}" role="button">Editar</a></td>
          <td>{!!Form::open(['route'=>['emails.destroy', $emails->id],'method'=>'delete'])!!}
            <button type="submit" class="btn btn-danger">Delete</button>
            {!!Form::close()!!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <footer class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content">
    <p>
      <hr class="divider">
      Copyright &COPY; 2016
    </p>
  </footer>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>