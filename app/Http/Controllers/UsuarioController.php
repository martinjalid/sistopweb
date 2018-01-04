<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ObraSocial;
use App\Receta;
use App\Optica;
use App\Administrador;
use App\Color;
use App\MaterialLente;
use App\Tratamiento;
use App\Profesional;
use App\Usuario;
use App\TipoLente;
use \Illuminate\Http\Request;
use Auth;
use Exception;

class UsuarioController extends Controller {

	public function editCreate($optica_id, $usuario_id = null, Request $request){
		try{
			$usuario = Usuario::find($usuario_id);

			if ( !$usuario )
				Usuario::create( $request->all() );
			else
				$usuario->update( $request->all() );

			$response = ['error' => false];

		}catch( Exception $e ){
    		$response = $this->formatError($e);
		}

		return $response;
	}

	public function showCliente($optica_id, $usuario_id, $receta_id = null){
		try {
			$usuario = Usuario::find($usuario_id);
			$receta = $usuario->recetas()->find( $receta_id );
			if ( is_null( $receta ) )
				$receta = $usuario->recetasLente()->find( $receta_id );
			
			if ( is_null( $receta ) )
				throw new Exception("No se encontro la receta", 1);

			$obras = ObraSocial::orderBy('id')->get();
			$recetas = $usuario->recetas()->orderBy('created_at', 'desc')->limit(3)->get();
			$profesionales = Profesional::orderBy('id')->get();
			$material_lente = MaterialLente::orderBy('id')->get();
			$color = Color::orderBy('id')->get();
			$tratamiento = Tratamiento::orderBy('id')->get();

			$tipos_lente = TipoLente::all();
			// dd( $usuario->getLastRecetas() );

			$response = view('usuario.usuarioEdit', [
    			'title' 		=> 'Datos de '.$usuario->nombre.' '.$usuario->apellido,
    			'obras'			=> $obras,
    			'recetas'		=> $recetas,
    			'receta'		=> $receta,
                'url'       	=> '/'.$optica_id.'/cliente',
                'usuario'   	=> $usuario,
				'profesional' 	=> $profesionales,
				'material_lente'=> $material_lente,
				'color'			=> $color,
				'tratamiento'	=> $tratamiento,
				'tipos_lente'	=> $tipos_lente
    		]);

		} catch (Exception $e) {
    		$response = $this->formatError($e);
		}

		return $response;
	}

	public function getCliente( $optica_id, $nombre = null, $apellido = null, $dni = null){
		try {
			$administrador = Administrador::find(1);

			$optica = Optica::find($optica_id);
			$usuarios = $optica->getClientes();
			$obras = ObraSocial::orderBy('id')->get();

			
			if ( $nombre && $nombre != 'all' ) {
				$usuarios->where('nombre', 'like', $nombre.'%');
			}

			if ( $apellido && $apellido != 'all' ) {
				$usuarios->where('apellido', 'like', $apellido.'%');
			}

			if ( $dni && $dni != 'all' ) {
				$usuarios->where('dni', 'like', $dni.'%');
			}

			$usuarios = $usuarios->paginate();

			$response = view('usuario.usuarioList', [
    			'title' 	=> 'Clientes', 
                'url'       => '/'.$optica_id,
                'usuarios'  => $usuarios, 
    			'obras'		=> $obras,
    			'filtro' 	=> true,    			
    		]);

		} catch (Exception $e) {
    		$response = $this->formatError($e);
		}

		return $response;
	}

}