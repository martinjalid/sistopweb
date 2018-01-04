<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RecetaLente extends Authenticatable{
    use Notifiable;

	protected $table = 'receta_lente';

	protected $fillable = [
		'od_esferico',
		'oi_esferico',
		'od_eje',
		'oi_eje',
		'od_cilindrico',
		'oi_cilindrico',
		'querometria_od',
		'querometria_oi',
		'tipo_lente',
		'diametro',
		'radio',
		'color',
		'usurio_id',
		'producto_id',
	];

	public function producto(){
        return $this->hasOne('App\Producto', 'id', 'producto_id');
    }

    public function getCreatedAtAttribute($value){
        $aux = explode( '-', $value );
        return $aux[1] . '/' . $aux[0];
    }
};