<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//---------//
/* LOGIN */
//--------//
Route::get('/login', 'LoginController@viewLogin')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/reset', 'LoginController@viewPasswordReset');
Route::post('/reset', 'LoginController@passwordReset');
Route::get('/logout', 'LoginController@logout');
//-----------//
/* END LOGIN*/
//-----------//


Route::get('/index', "IndexController@index");
Route::get('/', "IndexController@index");

Route::get('/cliente', "UsuarioController@getCliente");
Route::get('/cliente/nombre/{nombre?}/apellido/{apellido?}/dni/{dni?}', "UsuarioController@getCliente");
Route::get('/cliente/id/{id}', "UsuarioController@showCliente");
Route::put('/cliente/id/{id}/edit', "UsuarioController@editCliente");


Route::get('/crearUsuario', "UsuarioController@crear");
Route::get('/nuevaObraSocial', "ObraSocialController@crear");
Route::get('/buscarUsuario', "UsuarioController@buscarUsuario");

Route::group(['prefix' => 'cliente'], function () {
	Route::get('actualizarUsuario/{usuario_id}', "UsuarioController@actualizar");
	Route::get('{usuario_id}', 'UsuarioController@showCliente');
	Route::get('{usuario_id}/editarReceta/{receta_id}', "RecetaController@editar");
	Route::get('{usuario_id}/guardarReceta', "RecetaController@guardar");
});

Route::group(['prefix' => 'administracion'], function () {
	Route::get('', "AdministracionController@show");
	Route::get('/guardarProfesional', "AdministracionController@guardarProfesional");

});
