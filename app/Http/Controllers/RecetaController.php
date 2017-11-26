<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ObraSocial;
use App\Receta;
use App\Usuario;
use \Illuminate\Http\Request;
use Exception;

	
class RecetaController extends Controller {
	
	public function guardar($usuario_id){
		$data = Input::all();
		$lejos = Input::get('lejos');
		$cerca = Input::get('cerca');
 		try {

			$receta = new Receta();
			$receta->usuario_id = $usuario_id;
			$receta->distancia = $data['distancia'];
			$receta->altura = $data['altura'];
			$receta->adicion = $data['adicion'];
			$receta->detalle_lente = $data['detalle'];
			$receta->tipo_lente_id = $data['tipo_lente_id'];
			$receta->profesional_id = $data['profesional_id'];
			$receta->observacion = $data['observacion'];
			$receta->administrador_id = 1;
			$receta->save();

			if ( $data['lejos_cerca'] == 'Lejos/Cerca' || $data['lejos_cerca'] == 'Lejos y Cerca' ) {
				
				$anteojo_lejos = new Anteojo();
				$anteojo_lejos->tipo = 'lejos'; 
				$anteojo_lejos->od_esferico = $lejos['der_esf']; 
				$anteojo_lejos->od_cilindrico = $lejos['der_cil']; 
				$anteojo_lejos->od_eje = $lejos['der_eje']; 
				$anteojo_lejos->oi_esferico = $lejos['izq_esf']; 
				$anteojo_lejos->oi_cilindrico = $lejos['izq_cil']; 
				$anteojo_lejos->oi_eje = $lejos['izq_eje']; 
				$anteojo_lejos->armazon = $lejos['armazon'] == "" ? null : $lejos['armazon']; 
				$anteojo_lejos->valor_lente = $lejos['valor_lente'] == "" ? null : $lejos['valor_lente']; 
				$anteojo_lejos->valor_armazon = $lejos['valor_armazon'] == "" ? null : $lejos['valor_armazon']; 
				$anteojo_lejos->tratamiento_color = $lejos['tratamiento_color'] == "" ? null : $lejos['tratamiento_color']; 
				$anteojo_lejos->color_id = $lejos['color'] == "" ? null : $lejos['color']; 
				$anteojo_lejos->tratamiento_id = $lejos['tratamiento'] == "" ? null : $lejos['tratamiento']; 
				$anteojo_lejos->material_lente_id = $lejos['material'] == "" ? null : $lejos['material']; 
				$anteojo_lejos->usuario_id = $usuario_id; 
				$anteojo_lejos->receta_id = $receta->id; 
				$anteojo_lejos->save();

				$anteojo_cerca = new Anteojo();
				$anteojo_cerca->tipo = 'cerca'; 
				$anteojo_cerca->od_esferico = $cerca['der_esf']; 
				$anteojo_cerca->od_cilindrico = $cerca['der_cil']; 
				$anteojo_cerca->od_eje = $cerca['der_eje']; 
				$anteojo_cerca->oi_esferico = $cerca['izq_esf']; 
				$anteojo_cerca->oi_cilindrico = $cerca['izq_cil']; 
				$anteojo_cerca->oi_eje = $cerca['izq_eje']; 
				$anteojo_cerca->armazon = $cerca['armazon'] == "" ? null : $cerca['armazon']; 
				$anteojo_cerca->valor_lente = $cerca['valor_lente'] == "" ? null : $cerca['valor_lente']; 
				$anteojo_cerca->valor_armazon = $cerca['valor_armazon'] == "" ? null : $cerca['valor_armazon']; 
				$anteojo_cerca->tratamiento_color = $cerca['tratamiento_color'] == "" ? null : $cerca['tratamiento_color']; 
				$anteojo_cerca->color_id = $cerca['color'] == "" ? null : $cerca['color'];
				$anteojo_cerca->tratamiento_id = $cerca['tratamiento'] == "" ? null : $cerca['tratamiento']; 
				$anteojo_cerca->material_lente_id = $cerca['material'] == "" ? null : $cerca['material']; 
				$anteojo_cerca->usuario_id = $usuario_id; 
				$anteojo_cerca->receta_id = $receta->id; 
				$anteojo_cerca->save();
				//var_dump($anteojo_cerca, $anteojo_lejos);die; 
			}else if ( $data['lejos_cerca'] == 'Lejos' ) {

				$anteojo_lejos = new Anteojo();
				$anteojo_lejos->tipo = 'lejos'; 
				$anteojo_lejos->od_esferico = $lejos['der_esf']; 
				$anteojo_lejos->od_cilindrico = $lejos['der_cil']; 
				$anteojo_lejos->od_eje = $lejos['der_eje']; 
				$anteojo_lejos->oi_esferico = $lejos['izq_esf']; 
				$anteojo_lejos->oi_cilindrico = $lejos['izq_cil']; 
				$anteojo_lejos->oi_eje = $lejos['izq_eje']; 
				$anteojo_lejos->armazon = $lejos['armazon']; 
				$anteojo_lejos->valor_lente = $lejos['valor_lente']; 
				$anteojo_lejos->valor_armazon = $lejos['valor_armazon']; 
				$anteojo_lejos->tratamiento_color = $lejos['tratamiento_color']; 
				$anteojo_lejos->color_id = $lejos['color']; 
				$anteojo_lejos->tratamiento_id = $lejos['tratamiento']; 
				$anteojo_lejos->material_lente_id = $lejos['material']; 
				$anteojo_lejos->usuario_id = $usuario_id;
				$anteojo_lejos->receta_id = $receta->id;
				$anteojo_lejos->save(); 

			}else{
				$anteojo_cerca = new Anteojo();
				$anteojo_cerca->tipo = 'cerca'; 
				$anteojo_cerca->od_esferico = $cerca['der_esf']; 
				$anteojo_cerca->od_cilindrico = $cerca['der_cil']; 
				$anteojo_cerca->od_eje = $cerca['der_eje']; 
				$anteojo_cerca->oi_esferico = $cerca['izq_esf']; 
				$anteojo_cerca->oi_cilindrico = $cerca['izq_cil']; 
				$anteojo_cerca->oi_eje = $cerca['izq_eje']; 
				$anteojo_cerca->armazon = $cerca['armazon']; 
				$anteojo_cerca->valor_lente = $cerca['valor_lente']; 
				$anteojo_cerca->valor_armazon = $cerca['valor_armazon']; 
				$anteojo_cerca->tratamiento_color = $cerca['tratamiento_color']; 
				$anteojo_cerca->color_id = $cerca['color']; 
				$anteojo_cerca->tratamiento_id = $cerca['tratamiento']; 
				$anteojo_cerca->material_lente_id = $cerca['material']; 
				$anteojo_cerca->usuario_id = $usuario_id; 
				$anteojo_cerca->receta_id = $receta->id; 
				$anteojo_cerca->save();
			}
		
		} catch (Exception $e) {
			 echo json_encode( array('error' => true, 'msj' => $e->getMessage(), 'line' => $e->getLine() ) );
		}		
	}

	public function showReceta($usuario_id, $receta_id){
		try {
			
			$usuario = Usuario::find($usuario_id);
			$receta = Receta::find($receta_id);
			$obras = ObraSocial::orderBy('id')->get();

			$response = view('receta.showReceta', [
    			'title' 	=> 'Receta de '.$usuario->nombre.' '.$usuario->apellido,
                'url'       => '/cliente/id/'.$usuario->id,
                'usuario'   => $usuario,
                'receta'	=> $receta,	
    		]);

		} catch (Exception $e) {
    		$response = $this->formatError($e);
		}

		return $response;
	}
}