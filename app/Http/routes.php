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

	Route::resource('query','queryController');
	Route::get('query/{id}/destroy', [
		'uses' => 'queryController@destroy',
		'as' => 'admin.query.destroy'
	]);

	Route::resource('ebic','EbicController');
	Route::get('ebic/{id}/destroy', [
		'uses' => 'EbicController@destroy',
		'as' => 'admin.ebic.destroy'
	]);	
	
	//pdf general de capacitaciones
	Route::get('pdfebic',function(){
		$ebic = DB::table('ebic')
    			->join('institucion', 'institucion.id', '=', 'ebic.id_institucion' )
    			->join('empleado', 'empleado.id', '=', 'ebic.id_empleado')
    			->join('beca','beca.id', '=', 'ebic.id_beca')
                ->join('pago', 'pago.id_beca', '=', 'beca.id')
    			->join('capacitacion', 'capacitacion.id', '=', 'ebic.id_capacitacion')
                ->select('ebic.*','institucion.nombre_institucion','institucion.direccion','empleado.first_name', 'empleado.last_name', 'empleado.rut', 'beca.id_tipo_beca', 'beca.porcentaje', 'capacitacion.nombre_capacitacion','pago.estado')
                ->orderBy('ebic.id','DESC')
                ->get();
		$pdf = PDF::loadView('admin.ebic.pdf', ['ebic' => $ebic]);
		return $pdf->download('capacitaciones.pdf');
	});

	//pdf capacitaciones con pagos pendientes
	Route::get('pdfpendientes',function(){
		$ebic = DB::table('ebic')
                ->join('institucion', 'institucion.id', '=', 'ebic.id_institucion' )
                ->join('empleado', 'empleado.id', '=', 'ebic.id_empleado')
                ->join('beca','beca.id', '=', 'ebic.id_beca')
                ->join('pago', 'pago.id_beca', '=', 'beca.id')
                ->join('capacitacion', 'capacitacion.id', '=', 'ebic.id_capacitacion')
                ->select('ebic.*','institucion.nombre_institucion','institucion.direccion','empleado.first_name', 'empleado.last_name', 'empleado.rut', 'beca.id_tipo_beca', 'beca.porcentaje', 'capacitacion.nombre_capacitacion','pago.estado')
                ->where('pago.estado', '=', 'pendiente')
                ->orderBy('ebic.id','DESC')
                ->get();
		$pdf = PDF::loadView('admin.ebic.pdfpendiente', ['ebic' => $ebic]);
		return $pdf->download('capacitaciones_pendientes.pdf');
	});

	//pdf capacitaciones con pagos al dia
	Route::get('pdfaldia',function(){
		$ebic = DB::table('ebic')
                ->join('institucion', 'institucion.id', '=', 'ebic.id_institucion' )
                ->join('empleado', 'empleado.id', '=', 'ebic.id_empleado')
                ->join('beca','beca.id', '=', 'ebic.id_beca')
                ->join('pago', 'pago.id_beca', '=', 'beca.id')
                ->join('capacitacion', 'capacitacion.id', '=', 'ebic.id_capacitacion')
                ->select('ebic.*','institucion.nombre_institucion','institucion.direccion','empleado.first_name', 'empleado.last_name', 'empleado.rut', 'beca.id_tipo_beca', 'beca.porcentaje', 'capacitacion.nombre_capacitacion','pago.estado')
                ->where('pago.estado', '=', 'pagado')
                ->orderBy('ebic.id','DESC')
                ->get();
		$pdf = PDF::loadView('admin.ebic.aldia', ['ebic' => $ebic]);
		return $pdf->download('capacitaciones_al_dia.pdf');
	});

	Route::get('porcentaje',function(){
		$sumaEmpleados = DB::table('empleado')
				->select(DB::raw('SUM(empleado.id) as suma '))
				->get();
		$porcentaje = DB::table('ebic')
				->select('capacitacion.nombre_capacitacion','institucion.nombre_institucion', DB::raw('SUM(empleado.id) as sumaEmpleados '))
    			->join('institucion', 'institucion.id', '=', 'ebic.id_institucion' )
    			->join('empleado', 'empleado.id', '=', 'ebic.id_empleado')
    			->join('capacitacion', 'capacitacion.id', '=', 'ebic.id_capacitacion')
    			->groupBy('capacitacion.nombre_capacitacion','institucion.nombre_institucion')
                ->get();
       
		$pdf = PDF::loadView('admin.ebic.porcentaje', ['porcentaje' => $porcentaje , 'sumaempleados'=> $sumaEmpleados]);
		return $pdf->download('porcentaje.pdf');
	});

	Route::get('pagospdf',function(){
		$pagos = DB::table('ebic')
           
                ->join('empleado', 'empleado.id', '=', 'ebic.id_empleado')
                ->join('beca','beca.id', '=', 'ebic.id_beca')
                ->join('tipobeca', 'tipobeca.id', '=', 'beca.id_tipo_beca')
                ->join('pago', 'pago.id_beca', '=', 'beca.id')
                ->join('capacitacion', 'capacitacion.id', '=', 'ebic.id_capacitacion')
                ->select('empleado.first_name', 'empleado.last_name', 'empleado.rut', 'beca.porcentaje','tipobeca.tipo_beca', 'capacitacion.nombre_capacitacion','pago.estado','pago.monto')
             
                ->orderBy('ebic.id','DESC')
                ->get();
       
		$pdf = PDF::loadView('admin.pago.pagos', ['pagos' => $pagos]);
		return $pdf->download('pagos.pdf');
	});


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