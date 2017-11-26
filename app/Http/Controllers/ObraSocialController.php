
<?php 
	
class ObraSocialController extends BaseController {

	public function crear(){
		$error = false;
		try{
			$data = Input::all();

			$obra_social = new ObraSocial();

			$obra_social->nombre = $data['nombre'];
			$obra_social->save();

			return json_encode($obra_social);

		}catch( Exception $e ){
			$error = true;
			echo $e;
			return $error;
		}

	}

}