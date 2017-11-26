<?php

class Administrador extends Eloquent{

	protected $table = 'administrador';

	 protected $hidden = [
        'password', 'remember_token',
    ];
}