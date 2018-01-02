<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrador extends Authenticatable{
	use Notifiable;
	
	protected $table = 'administrador';

	protected $hidden = [
        'password', 'remember_token',
    ];

}