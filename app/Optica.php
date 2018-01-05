<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Optica extends Authenticatable{
	use Notifiable;

	protected $table = 'optica';
	public $timestamps = false;

    public function getClientes(){
    	return $this->hasMany('App\Usuario', 'optica_id', 'id');
    }

    public function usuarios(){
        return $this->belongsToMany('App\Administrador', 'administrador_optica', 'optica_id', 'administrador_id');
    }

    public function profesionales(){
    	return $this->hasMany('App\Profesional', 'optica_id', 'id');
    }

}