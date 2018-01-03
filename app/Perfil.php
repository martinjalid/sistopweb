<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Perfil extends Authenticatable{
	use Notifiable;
	
	protected $table = 'perfil';

}