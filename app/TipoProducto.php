<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class TipoProducto extends Authenticatable{
    use Notifiable;

	protected $table = 'tipo_producto';
	public $timestamps = false;

}