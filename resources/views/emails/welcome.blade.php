<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
</head>
<body>
<!-- <Mensaje que se envía al correo para que sea verificado> -->
<h2>Welcome</h2>

<div>
{!! $name !!} Welcome to WebMail!
Your username is {!! $email !!} !
<a href="http://localhost:8000/mail/verificar/{!!$token!!}">Confirm your new account please!</a>
</div>

</body>
</html>