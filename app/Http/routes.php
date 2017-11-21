<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

	/*rutas del usuario*/

	Route::group(['prefix' => 'admin'], function(){

    Route::resource('users','UsersController');

    Route::get('users/{id}/destroy', [
		'uses' => 'UsersController@destroy',
		'as' => 'admin.users.destroy'
	]);

    Route::resource('usertype','UsertypeController');

    Route::get('usertype/{id}/destroy', [
		'uses' => 'UsertypeController@destroy',
		'as' => 'admin.usertype.destroy'
	]);

    Route::resource('institucion','institucionController');

    Route::get('institucion/{id}/destroy', [
		'uses' => 'institucionController@destroy',
		'as' => 'admin.institucion.destroy'
	]);

	Route::resource('empleado','EmpleadosController');
	Route::get('empleado/{id}/destroy', [
		'uses' => 'EmpleadosController@destroy',
		'as' => 'admin.empleado.destroy'
	]);

	Route::resource('pago','PagoController');
	Route::get('pago/{id}/destroy', [
		'uses' => 'PagoController@destroy',
		'as' => 'admin.pago.destroy'
	]);

	Route::resource('ebic','EbicController');
	Route::get('ebic/{id}/destroy', [
		'uses' => 'EbicController@destroy',
		'as' => 'admin.ebic.destroy'
	]);	


});

Route::resource('capacitaciones','capacitacionesController');

Route::get('capacitaciones/{id}/destroy', [
			'uses' => 'capacitacionesController@destroy',
			'as' => 'capacitaciones.destroy'
		]);



Route::resource('tipobeca','tipobecaController');
Route::get('tipobeca/{id}/destroy', [
			'uses' => 'tipobecaController@destroy',
			'as' => 'tipobeca.destroy'
		]);

Route::resource('beca','becaController');
Route::get('beca/{id}/destroy', [
			'uses' => 'becaController@destroy',
			'as' => 'beca.destroy'
		]);