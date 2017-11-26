<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ObraSocial extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'obra_social';
    
    protected $fillable = [
        'nombre',
    ];


	public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
