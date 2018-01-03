<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ObraSocial;
	
class IndexController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index($optica_id){
		$obras = ObraSocial::all();

		$data = array('obras' => $obras );

		return view('index', [ 'title' => 'Administración Ned', 'url' => '/'.$optica_id, 'obras' => $obras ] );
	}

}

