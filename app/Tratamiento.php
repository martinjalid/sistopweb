<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tratamiento extends Authenticatable{
    use Notifiable;

	protected $table = 'tratamiento';

	protected $fillable = [
		'nombre',
	];

	public $timestamps = false;

}