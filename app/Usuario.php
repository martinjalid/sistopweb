<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable{
	use Notifiable;

	protected $table = 'usuario';

	protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'telefono',
        'direccion',
        'num_obra_social',
        'obra_social_id',
        'administrador_id',
        'optica_id'
    ];

    public function obra(){
        return $this->hasOne('App\ObraSocial', 'id', 'obra_social_id')->first();
    }

    public function recetas(){
        return $this->hasMany('App\Receta', 'usuario_id', 'id')->where('activo', 1);
    }

    public function recetasLente(){
        return $this->hasMany('App\RecetaLente', 'usuario_id', 'id')->where('activo', 1);
    }

    public function ultimaReceta(){
        
        $receta = $this->recetas()->orderBy('created_at', 'desc')->first();
        $receta_lente = $this->recetasLente()->orderBy('created_at', 'desc')->first();

        if ( is_null( $receta ) )
            return $receta_lente;
        else if( is_null( $receta_lente ) )
            return $receta;
        else
            return ( $receta->created_at > $receta_lente->created_at ) ? $receta : $receta_lente;
    }

    public function getLastRecetas(){
        $recetas = $this->recetas()->orderBy('created_at', 'desc')->limit(3)->get();
        // $recetas_lente = $this->recetas()->orderBy('created_at', 'desc')->limit(3)->get();
        $recetas_lente = $this->recetasLente()->orderBy('created_at', 'desc')->limit(3)->get();
        foreach ($recetas_lente as $r) {
            $recetas->push($r); 
        }

        if ( $recetas->count() == 13 ) {
            return $recetas;
        }else{

            $array = array();
            $min_date = '';
            $max_date = '';
            foreach ($recetas as $r) {
                if ( $r->created_at > $max_date ) {
                    array_unshift($array, $r);
                    $max_date = $r->created_at;
                }else if( $r->created_at > $min_date ){
                    if ( $array->count() == 3 ) {
                        # code...
                    }
                    $i = 0;
                    foreach ($array as $el) {
                        if ( $r->created_at > $el->created_at ) {
                            # code...
                        }
                    }
                }

            }
            dd( $array );

            return $array;
        }
    }

}