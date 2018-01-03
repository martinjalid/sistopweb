<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrador extends Authenticatable{
	use Notifiable;
	
	protected $table = 'administrador';

	protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfil(){
        return $this->hasOne('App\Perfil', 'id', 'perfil_id')->first()->nombre;
    }

    public function opticas(){
        return $this->belongsToMany('App\Optica', 'administrador_optica', 'administrador_id', 'optica_id');
    }

}