<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profesional extends Authenticatable{
    use Notifiable;

	protected $table = 'profesional';

	protected $fillable = [
		'nombre',
	];

	public $timestamps = false;

}