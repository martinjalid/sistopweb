<?php  


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Optica;

class AdministracionController extends Controller {

	public function show($optica_id){
	
		$usuarios = Optica::find( session('optica_id') )->usuarios()->where('perfil_id', 2)->get();

		return view('administracion.index',  [ 
			'title' 	=> 'Administración Ned', 
			'url' 		=> '/'.session('optica_id'),
			'usuarios'	=> $usuarios
		]);
		
	}

	public function saveProfesional($optica_id){
		try {
			$profesional = Profesional::find( $request->get('profesional_id') );

			if ( is_null( $profesional ) )
				Profesional::create( $request->all() );
			else
				$profesional->update( $request->all() );
			
		} catch (Exception $e) {
    		$response = $this->formatError($e);
		}
		return $response;
	}
}

?>