<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/*
Se crea un modelo Mail, éste se encarga de enviar y recibir datos de
la base de datos y los envía al controlador.
*/
class Emails extends Model {
	protected $table = 'emails';
	protected $fillable = [ 'destinatario', 'asunto', 'fecha', 'mensaje', 'estado'];
	public $timestamps = false;
}