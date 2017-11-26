<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Anteojo extends Authenticatable{
    use Notifiable;

	protected $table = 'anteojo';

	protected $fillable = [
		'distancia',
		'od_esferico',
		'oi_esferico',
		'od_eje',
		'oi_eje',
		'od_cilindrico',
		'oi_cilindrico',
		'armazon',
		'valor_lente',
		'valor_armazon',
		'tratamiento_color',
		'color_id',
		'tratamiento_id',
		'material_lente_id',
		'receta_id',
		'usurio_id',
	];

	public $timestamps = false;

}