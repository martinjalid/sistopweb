<?php  


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ObraSocial;

class AdministracionController extends Controller {

	public function show(){
	
		return view('administracion.index',  [ 'title' => 'Administración Ned', 'url' => '/index' ]);
		
	}
}

?>