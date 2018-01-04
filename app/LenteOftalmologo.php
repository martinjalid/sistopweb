<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LenteOftalmologo extends Authenticatable{
    use Notifiable;

	protected $table = 'lente_oftalmologo';
	public $timestamps = false;
	
}