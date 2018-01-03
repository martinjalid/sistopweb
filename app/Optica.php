<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Optica extends Authenticatable{
	use Notifiable;

	protected $table = 'optica';

    public function getClientes(){
    	return $this->hasMany('App\Usuario', 'optica_id', 'id');
    }
}