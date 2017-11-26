<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MaterialLente extends Authenticatable{
    use Notifiable;

	protected $table = 'material_lente';

	protected $fillable = [
		'nombre',
	];

	public $timestamps = false;

}