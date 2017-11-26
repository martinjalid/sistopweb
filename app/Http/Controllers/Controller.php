<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function formatError($e){
    	return ['error' => true, 'msj' => $e->getMessage(), 'detalle' => 'Línea: ' . $e->getLine() . '. Archivo: ' . $e->getFile()];
    }
}
