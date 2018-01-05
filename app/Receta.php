<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Receta extends Authenticatable{
    use Notifiable;

	protected $table = 'receta';
	public $timestamps = false;

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
		'producto_id'
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