<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Producto extends Authenticatable{
    use Notifiable;

	protected $table = 'producto';

    protected $fillable = [
        'profesional_id',
        'observacion',
        'usuario_id',
        'tipo_producto_id',
        'activo',
    ]; 

	public function receta(){
        return $this->hasOne('App\Receta', 'producto_id', 'id');
    }

    public function recetaLente(){
        return $this->hasOne('App\RecetaLente', 'producto_id', 'id');
    }

    public function tipoProducto(){
        return $this->hasOne('App\TipoProducto', 'id', 'tipo_producto_id');
    }

    public function getCreatedAtAttribute($value){
    	$dt = Carbon::parse($value);
        return $dt;
    }

}