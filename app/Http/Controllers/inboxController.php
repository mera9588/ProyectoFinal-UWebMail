<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class inboxController extends Controller
{
    //Metodo para cargar la tabla de los correos.
    public function index(){
    	$emails = DB::select('select * from emails');

    	return view('inbox',compact('emails'));
    }


}