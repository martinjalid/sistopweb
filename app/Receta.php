<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Receta extends Authenticatable{
    use Notifiable;

	protected $table = 'receta';

	protected $fillable = [
		'distancia',
		'altura',
		'adicion',
		'administrador_id',
		'observacion',
		'detalle_lente',
		'usuario_id',
		'profesional_id',
		'tipo_lente_id',
		'activo',
	];

	public function anteojos(){
		return $this->hasMany('App\Anteojo', 'receta_id', 'id')->get();
	}

	public function tipo_lente(){
        return $this->hasOne('App\TipoLente', 'id', 'tipo_lente_id')->first()->nombre;
    }

    public function medico(){
        return $this->hasOne('App\Profesional', 'id', 'profesional_id')->first()->nombre;
    }

}