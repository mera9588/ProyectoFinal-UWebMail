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
      <li class="active"><a href="{{URL::to('emails/create')}}" title="Compose" class="btn btn-compose">Nuevo</a></li>
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
    {!!  Form::model($emails ,['route'=>['emails.update' ,$emails],'method'=>'put'])!!}
    <div class="form-group">
      <label for="exampleInputEmail1">destino</label>
      {!!Form::text('destinatario',null,['class'=>'form-control','placeholder'=>'example@gmail.com'])!!}
    </div>
    <div class="form-group">
      <label for="example">asunto</label>
      {!!Form::text('asunto',null,['class'=>'form-control','placeholder'=>'Subject'])!!}
    </div>
    <div class="form-group">
      <label for="example">mensaje</label>
      {!!Form::textarea ('mensaje',null,['class'=>'form-control','placeholder'=>'Write the message here'])!!}
    </div>
    {!!Form::open(['route'=>['emails.update' ,$emails->id],'method'=>'update'])!!}
    <button type="submit" class="btn btn-danger">Editar</button>
    {!!Form::close()!!}
  </div>
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