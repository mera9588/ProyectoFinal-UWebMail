<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use Session;
use Illuminate\Routing\Controller;
use App\Emails;
use DB;

class MailController extends Controller {

	/*
	Método que muestra los datos del correo en la vista edit.
	*/
	public function edit($id) {
		$emails=Emails::findOrFail($id);
		return view('emails/edit',compact('emails'));
	}

	/*
	Método que elimina correos de la base de datos.
	*/
	public function destroy($id) {
		$emails=Emails::find($id);
		$emails->delete();
		return Redirect::to('inbox')->with('status', '¡Mensaje eliminado con éxito!');
	}

	/*
	Método que selecciona los correos en estado 2 que seria la bandeja de borrador de la base de datos.
	*/
	public function draft(){
		$emails = DB::select('select * from emails where estado = 2');
		return view ('emails/draft', ['emails'=>$emails]);
	}

	/*
	Método que selecciona los correos en estado 1 que seria la bandeja de enviados de la base de datos.
	*/
	public function sent(){
		$emails = DB::select('select * from emails where estado = 1');
		return view ('emails/sent', ['emails'=>$emails]);
	}	

	/*
	Método para actualizar un correo por medio de id y actualiza en la base de datos.
	*/
	public function update(Request $request, $id) {
		$emails=Emails::find($id);
		$emails->destinatario=$request->destinatario;
		$emails->asunto=$request->asunto;
		$emails->mensaje=$request->mensaje;
		$emails->save();
		return Redirect::to('inbox')->with('status', '¡Correo actualizado con éxito!');
	}

	/*
	Método para crear los correos en la base de datos.
	*/
	public function create() {
		return view('emails.write');
	}

	/*
	Método que muestra el correo guardado en la base de datos.
	*/
	public function show($id) {
		$emails=Emails::findOrFail($id);
		return view('emails/displaymail',compact('emails'));
	}

	/*
	Método para crear un correo nuevo y guardarlo en la base de datos.
	*/
	public function store(Request $request) {
		$emails = new Emails;
		$emails->destinatario=$request->destinatario;
		$emails->asunto=$request->asunto;
		$emails->mensaje=$request->mensaje;
		$emails->save();
		return Redirect::to('inbox')->with('status', '¡Correo Guardado!');
	}

	/*
	Método para verificar el usuario por medio del token almacenado en la base de datos.
	*/
	public function verificar($token) {
		$user = DB::table('users')
		->where('token', '=', $token)
		->get();

		if ((empty($user))) {
			return Redirect::to('/auth/login')->with('status', '¡Lo siento, no ha verificado su cuenta!');
		}
		else {
			DB::table('users')
			->where('token', $token)
			->update(['status' => 1]);
			return Redirect::to('/auth/login')->with('status', '¡Bienvenido!');
		}
	}
}