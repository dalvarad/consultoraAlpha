<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\capacitacion;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class CapacitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $capacitaciones = \DB::table('capacitacion')
                  ->select('capacitacion.*')
                  ->orderBy('capacitacion.id','DESC')
                  ->get();

        return view('capacitaciones.index')->with('capacitaciones', $capacitaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('capacitaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $capacitaciones = new capacitacion($request->all());
        

        $capacitaciones->save();

        Session::flash('message_success', "Se ha registrado la capacitacion $capacitaciones->nombre Exitosamente!");

            return redirect(route('capacitaciones.index'));
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
        $capacitacion = capacitacion::find($id);
        return view('capacitaciones.edit')->with('capacitacion', $capacitacion);
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
        $capacitacion = capacitacion::find($id);
        $capacitacion->nombre = $request->nombre;
        $capacitacion->cupos = $request->cupos;
        $capacitacion->fecha_inicio = $request->fecha_inicio;
        $capacitacion->fecha_fin = $request->fecha_fin;
        $capacitacion->duracion = $request->duracion;
        $capacitacion->save();

        return redirect()->route('capacitaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capacitacion = capacitacion::find($id);
        $capacitacion->delete();    

        Session::flash('message_danger', "Se ha eliminado la capacitacion $capacitacion->nombre Exitosamente!");
        return redirect(route('capacitaciones.index'));
    }
}
