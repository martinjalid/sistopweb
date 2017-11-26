<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ObraSocial;
use App\Receta;
use App\Color;
use App\MaterialLente;
use App\Tratamiento;
use App\Profesional;
use App\Usuario;
use \Illuminate\Http\Request;
use Exception;

class UsuarioController extends Controller {

	public function crear( Request $request ){
		$error = false;
		try{
			$data = $request->all();
			$usuario = new Usuario();

			$usuario->nombre = trim( $data['nombre'] );
			$usuario->apellido = trim( $data['apellido'] );
			$usuario->obra_social_id = $data['obra_social'];
			$usuario->dni = $data['dni'] ;
			$usuario->direccion = trim( $data['direccion'] );
			$usuario->telefono = $data['telefono'];
			$usuario->num_obra_social = $data['num_obra_social'];
			$usuario->administrador_id = 1;
			$usuario->save();

			return $usuario;

		}catch( Exception $e ){
			echo json_encode( array('error' => true, 'msj' => $e->getMessage(), 'line' => $e->getLine() ) );
		}

	}

	public function editCliente($usuario_id, Request $request){
		try{
			$data = $request->all();

			$usuario = Usuario::find($usuario_id);

			if ( !$usuario ) {
				throw new Exception("Error Processing Request", 1);
			}

			$usuario->nombre = trim( $data['nombre'] );
			$usuario->apellido = trim( $data['apellido'] );
			$usuario->obra_social_id = $data['obra'];
			$usuario->dni = $data['dni'];
			$usuario->direccion = trim( $data['direccion'] );
			$usuario->telefono = $data['telefono'];
			$usuario->num_obra_social = $data['num_obra'];
			$usuario->save();

			$response = ['error' => false];

		}catch( Exception $e ){
    		$response = $this->formatError($e);
		}

		return $response;

	}

	public function showCliente($usuario_id){
		try {
			
			$usuario = Usuario::find($usuario_id);
			$obras = ObraSocial::orderBy('id')->get();
			$recetas = $usuario->recetas()->orderBy('created_at', 'desc')->limit(3)->get();
			$receta = $usuario->recetas()->orderBy('created_at', 'desc')->first();
			$profesionales = Profesional::orderBy('id')->get();
			$material_lente = MaterialLente::orderBy('id')->get();
			$color = Color::orderBy('id')->get();
			$tratamiento = Tratamiento::orderBy('id')->get();

			$response = view('usuario.usuarioEdit', [
    			'title' 		=> 'Datos de '.$usuario->nombre.' '.$usuario->apellido,
    			'obras'			=> $obras,
    			'recetas'		=> $recetas,
    			'receta'		=> $receta,
                'url'       	=> '/cliente',
                'usuario'   	=> $usuario,
				'profesional' 	=> $profesionales,
				'material_lente'=> $material_lente,
				'color'			=> $color,
				'tratamiento'	=> $tratamiento
    		]);

		} catch (Exception $e) {
    		$response = $this->formatError($e);
		}

		return $response;
	}

	public function buscarUsuario(Request $request){
		
		$nombre = trim($request->nombre).'%';
		$apellido = trim($request->apellido).'%';
		$dni = trim($request->dni).'%';

		$usuarios = Usuario::where('nombre' , 'like', $nombre)->where('apellido', 'like', $apellido)->where('dni', 'like', $dni)->orderBy('id', 'desc')->limit(10)->get();

		return json_encode($usuarios);
	}

	public function getCliente( $nombre = null, $apellido = null, $dni = null){
		try {
			
			$usuarios = Usuario::orderBy('id', 'asc');

			if ( $nombre && $nombre != 'all' ) {
				$usuarios->where('nombre', 'like', $nombre.'%');
			}

			$usuarios = $usuarios->paginate();

			$response = view('usuario.usuarioList', [
    			'title' 	 => 'Clientes', 
                'url'        => '/',
                'usuarios'   => $usuarios, 
    			'filtro' 	 => true,    			
    		]);

		} catch (Exception $e) {
    		$response = $this->formatError($e);
		}

		return $response;
	}

}