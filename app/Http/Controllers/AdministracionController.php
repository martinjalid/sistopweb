<?php  


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Optica;

class AdministracionController extends Controller {

	public function show(){
	
		$usuarios = Optica::find( session('optica_id') )->usuarios()->where('perfil_id', 2)->get();

		return view('administracion.index',  [ 
			'title' 	=> 'Administración Ned', 
			'url' 		=> '/'.session('optica_id'),
			'usuarios'	=> $usuarios
		]);
		
	}
}

?>