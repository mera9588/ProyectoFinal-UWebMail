<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Auth;
use Lang;

class UserController extends Controller
{

/*
Función para verificar que se haya hecho la confirmación del correo por gmail.
*/
public function login(request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' =>  $request->password ,'status'=>'1'] )) {
            // Authentication passed...
            return redirect('home');
        }

        $r= Lang::has('auth.failed')
                ? Lang::get('auth.failed')
                : 'These credentials do not match our records.';

        return redirect('/auth/login')->withErrors($r);
    }
}