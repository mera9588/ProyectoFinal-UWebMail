<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class conexion extends Controller
{
    //Método para iniciar sesion en la pantalla inbox.
    public function inicioSesion(){
    	return view('inbox');
    }
}
