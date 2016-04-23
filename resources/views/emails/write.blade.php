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
      <li class="active"><a href="{{URL::to('emails/create')}}" data-toggle="modal" title="Compose" class="btn btn-compose">Nuevo</a></li>
      <!-- Modal -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button" id="closeModal">×</button>
              <h4 class="modal-title">Redactar</h4>
            </div>
            <div class="modal-body">
              <form role="form" class="form-horizontal">
                <div class="form-group">
                  <label class="col-lg-2 control-label">Para</label>
                  <div class="col-lg-10">
                    <input type="email" id="inputEmail" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Asunto</label>
                  <div class="col-lg-10">
                    <input type="text" id="inputAsunto" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Mensaje</label>
                  <div class="col-lg-10">
                    <textarea rows="10" cols="30" class="form-control" id="inputMensaje" name=""></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-send" type="button" id="enviarCorreo">Guardar</button>
                  </div>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
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
    @if(count($errors)>0)
    <div class = "alert alert-danger">
      <ul>
        @foreach($errors->all()as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class ="container col-xs-8">
      <form action ='/emails' method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
          <label for="exampleInputEmail1">Para</label>
          {!!Form::email('destinatario',null,['class'=>'form-control','placeholder'=>'example@gmail.com'])!!}
        </div>
        <div class="form-group">
          <label for="example">Asunto</label>
          {!!Form::text('asunto',null,['class'=>'form-control','placeholder'=>'Asunto'])!!}
        </div>
        <div class="form-group">
          <label for="example">Mensaje</label>
          {!!Form::textarea('mensaje',null,['class'=>'form-control','placeholder'=>'Digite su mensaje'])!!}
        </div>
        <div style="text-align:right">
          <button type="submit" class="btn btn-send">Guardar</button>
          {!!Form::close()!!}
        </div>
      </div>
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