<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Color extends Authenticatable{
    use Notifiable;

	protected $table = 'color';

	protected $fillable = [
		'nombre',
	];

	public $timestamps = false;

}