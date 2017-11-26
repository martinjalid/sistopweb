<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TipoLente extends Authenticatable{
    use Notifiable;

	protected $table = 'tipo_lente';

	protected $fillable = [
		'nombre',
	];

	public $timestamps = false;

}