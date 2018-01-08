<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Receta;
use App\Optica;
use App\Usuario;
use \Illuminate\Http\Request;
use Exception;

	
class RecetaController extends Controller {

	public function update($optica_id, $usuario_id, $producto_id, Request $request){
		try {
			$optica = Optica::find( $optica_id );

			if ( is_null($optica) )
				throw new Exception("No se Encontro la optica");

			$usuario = $optica->getClientes()->find( $usuario_id );
			if ( is_null( $usuario ) )
				throw new Exception("El usuario enviado no corresponde con la óptica");
			
			$producto = $usuario->productos()->find( $producto_id );			
			if ( is_null( $producto ) )
				throw new Exception("El producto corresponde con el cliente");

			if ( $producto->tipoProducto->nombre == 'Anteojo' ) {

				if ( !is_null( $request->all('lejos')['lejos'] ) )
					$producto->receta->anteojos()->where('tipo', 'lejos')->first()->update( $request->all('lejos')['lejos'] );

				if ( !is_null( $request->all('cerca')['cerca'] ) )
					$producto->receta->anteojos()->where('tipo', 'cerca')->first()->update( $request->all('cerca')['cerca'] );

				$producto->receta()->update( $request->all('receta')['receta'] );
			}else{
				$producto->recetaLente->prueba()->update( $request->all('prueba')['prueba'] );
				$producto->recetaLente->oftalmologo()->update( $request->all('oftalmologo')['oftalmologo'] );
				$producto->recetaLente()->update( $request->all('receta_lente')['receta_lente'] );
			}

			$producto->update( $request->all('producto')['producto'] );
			
			$response = ['error' => false];
		} catch (Exception $e) {
    		$response = $this->formatError($e);
		}

		return $response;
	}

	public function create($optica_id, $usuario_id){

	}
}