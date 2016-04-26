<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class inboxController extends Controller {
	//Método para cargar los correos de la base de datos en la bandeja de salida.
	public function index() {
		$emails = DB::select('select * from emails where estado = 0');
		return view('inbox',compact('emails'));
    }
}