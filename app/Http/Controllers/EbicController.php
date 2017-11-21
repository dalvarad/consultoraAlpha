<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class EbicController extends Controller
{
    public function index()
    {
    	$ebic = DB::table('empleado_beca_institucion_capacitacion')
    			->join('institucion', 'institucion.id', '=', 'empleado_beca_institucion_capacitacion.id_institucion' )
    			->join('empleado', 'empleado.id', '=', 'empleado_beca_institucion_capacitacion.id_empleado')
    			->join('beca','beca.id', '=', 'empleado_beca_institucion_capacitacion.id_beca')
    			->join('capacitacion', 'capacitacion.id', '=', 'empleado_beca_institucion_capacitacion.id_capacitacion')
                ->select('empleado_beca_institucion_capacitacion.*','institucion.nombre','institucion.direccion','empleado.first_name', 'empleado.last_name', 'empleado.rut', 'beca.id_tipo_beca', 'beca.porcentaje', 'capacitacion.nombre')
                ->orderBy('empleado_beca_institucion_capacitacion.id','DESC')
                ->get();

        return view('admin.ebic.index')->with('ebic', $ebic);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista_beca = DB::table('beca')
        			  ->orderBy('id')
        			  ->lists('id','porcentaje');
        
        $lista_empleados = DB::table('empleado')
        				->orderBy('id')
        				->lists('id','rut');
        
        $lista_instituciones = DB::table('institucion')
        					   ->orderBy('id')
        					   ->lists('id','nombre');

        $lista_capacitaciones = DB::table('capacitacion')
        					  ->orderBy('id')
        					  ->lists('id','nombre');

        return view('admin.ebic.create')->with('lista_beca',$lista_beca)->with('lista_empleados', $lista_empleados)->with('lista_instituciones', $lista_instituciones)->with('lista_capacitaciones', $lista_capacitaciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ebic = new empleado_beca_institucion_capacitacion($request->all());
        
    	$ebic->save();

        Session::flash('message_success', "Se ha registrado la capacitacion $empleado_beca_institucion_capacitacion->id exitosamente!");

        return redirect(route('admin.ebic.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ebic = empleado_beca_institucion_capacitacion::find($id);
        $lista_beca = DB::table('beca')
        			  ->orderBy('id')
        			  ->lists('id','porcentaje');

        $lista_empleados = DB::table('empleado')
        				->orderBy('id')
        				->lists('id','rut');
        
        $lista_instituciones = DB::table('institucion')
        					   ->orderBy('id')
        					   ->lists('id','nombre');

        $lista_capacitaciones = DB::table('capacitacion')
        					  ->orderBy('id')
        					  ->lists('id','nombre');

        return view('admin.pago.edit')->with('pago', $pago)->with('lista_beca', $lista_beca)with('lista_empleados', $lista_empleados)->with('lista_instituciones', $lista_instituciones)->with('lista_capacitaciones', $lista_capacitaciones);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ebic = empleado_beca_institucion_capacitacion::find($id);
        $ebic->fill($request->all());
        $ebic->save();

        Session::flash('message_success', "Se ha modificado la capacitacion $empleado_beca_institucion_capacitacion->id exitosamente!");
        return redirect(route('admin.ebic.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ebic = empleado_beca_institucion_capacitacion::find($id);
        $ebic->delete();

        Session::flash('message_danger', "Se ha eliminado la capacitacion $empleado_beca_institucion_capacitacion->id exitosamente!");
        return redirect(route('admin.ebic.index'));
    }
}
