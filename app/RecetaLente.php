<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

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

    public function prueba(){
    	return $this->hasOne('App\LentePrueba', 'receta_lente_id', 'id');
    }

    public function oftalmologo(){
    	return $this->hasOne('App\LenteOftalmologo', 'receta_lente_id', 'id');
    }

    public function getCreatedAtAttribute($value){
    	$dt = Carbon::parse($value);
        return $dt;
    }
};