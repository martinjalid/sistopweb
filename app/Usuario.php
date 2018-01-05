<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable{
	use Notifiable;

	protected $table = 'usuario';

	protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'telefono',
        'direccion',
        'num_obra_social',
        'obra_social_id',
        'administrador_id',
        'optica_id'
    ];

    public function obra(){
        return $this->hasOne('App\ObraSocial', 'id', 'obra_social_id')->first();
    }

    public function productos(){
        return $this->hasMany('App\Producto', 'usuario_id', 'id')->where('activo', 1);
    }

    public function ultimoProducto(){
        return $this->productos()->orderBy('created_at', 'desc')->first();
    }

}