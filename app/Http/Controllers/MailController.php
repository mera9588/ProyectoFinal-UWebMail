<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use Session;
use Illuminate\Routing\Controller;
use App\Emails;
use DB;

class MailController extends Controller
{

/*
Función que permite mostrar los datos del correo en la vista edit.
*/
public function edit($id)
{
	$emails=Emails::findOrFail($id);
	return view('emails/edit',compact('emails'));
}

/*
Función que permite eliminar correos de la base de datos.
*/
public function destroy($id)
{
	$emails=Emails::find($id);
	$emails->delete();
	return Redirect::to('inbox')->with('status', '¡Mensaje eliminado con éxito!');
}

/*
Función que actualiza un solo correo por medio de su id y lo guarda
en la base de datos.
*/
public function update(Request $request, $id)
{
	$emails=Emails::find($id);
	$emails->destinatario=$request->destinatario;
	$emails->asunto=$request->asunto;
	$emails->mensaje=$request->mensaje;
	$emails->save();
	return Redirect::to('inbox')->with('status', '¡Mensaje actualizado con éxito!');
}

public function create()
{
	return view('emails.write');
}

public function show($id)
{

}

/*
Función para crear un nuevo correo y guardarlo en la base de datos.
*/
public function store(Request $request)
{
	$emails = new Emails;
	$emails->destinatario=$request->destinatario;
	$emails->asunto=$request->asunto;
	$emails->mensaje=$request->mensaje;
	$emails->save();
	return Redirect::to('inbox')->with('status', '¡Mensaje Guardado!');
}

public function verificar($token){

$user = DB::table('users')
->where('token', '=', $token)
->get();

if ((empty($user))) {
return Redirect::to('/auth/login')->with('status', '¡Lo siento, no ha verificado su cuenta!');
}
else
{
DB::table('users')
->where('token', $token)
->update(['status' => 1]);
  return Redirect::to('inbox')->with('status', '¡Bienvenido!');
}

}

}