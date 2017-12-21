<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ebic;
use DB;
use App\capacitacion;
use Illuminate\Support\Facades\Session;

class EbicController extends Controller
{
    public function __construct()
     {
         $this->middleware('admin', ['only' => ['create','store', 'edit', 'update', 'destroy']]);
     }
    public function index()
    {
    	$ebic = DB::table('ebic')
                ->join('institucion', 'institucion.id', '=', 'ebic.id_institucion' )
                ->join('empleado', 'empleado.id', '=', 'ebic.id_empleado')
                ->join('beca','beca.id', '=', 'ebic.id_beca')
                ->join('pago', 'pago.id_beca', '=', 'beca.id')
                ->join('capacitacion', 'capacitacion.id', '=', 'ebic.id_capacitacion')
                ->select('ebic.*','institucion.nombre_institucion','institucion.direccion','empleado.first_name', 'empleado.last_name', 'empleado.rut', 'beca.id_tipo_beca', 'beca.porcentaje', 'capacitacion.nombre_capacitacion','pago.estado')
                ->orderBy('ebic.id','DESC')
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
        			  ->lists('porcentaje', 'id');
        
        $lista_empleados = DB::table('empleado')
        				->orderBy('id')
        				->lists('rut', 'id');
        
        $lista_instituciones = DB::table('institucion')
        					   ->orderBy('id')
        					   ->lists('nombre_institucion', 'id');

        $lista_capacitaciones = DB::table('capacitacion')
        					  ->orderBy('id')
        					  ->lists('nombre_capacitacion', 'id');

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
        $ebic = new Ebic($request->all());

        //disminuye en uno el cupo de una capacitacion
        $cpc = $ebic->id_capacitacion;
        $cpc2 = capacitacion::find($cpc);
        $cpc2->cupos = $cpc2->cupos - 1;
        $cpc2->save(); 
        
    	$ebic->save();

        Session::flash('message_success', "Se ha registrado la capacitacion $ebic->id exitosamente!");

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
        $ebic = Ebic::find($id);
        $lista_beca = DB::table('beca')
        			  ->orderBy('id')
        			  ->lists('porcentaje', 'id');

        $lista_empleados = DB::table('empleado')
        				->orderBy('id')
        				->lists('rut', 'id');
        
        $lista_instituciones = DB::table('institucion')
        					   ->orderBy('id')
        					   ->lists('nombre_institucion', 'id');

        $lista_capacitaciones = DB::table('capacitacion')
        					  ->orderBy('id')
        					  ->lists('nombre_capacitacion', 'id');

        //aumenta en uno la cantidad de cupos de la capacitacion que se va a modificar
        $cpc = $ebic->id_capacitacion;
        $cpc2 = capacitacion::find($cpc);
        $cpc2->cupos = $cpc2->cupos + 1;
        $cpc2->save(); 

        return view('admin.ebic.edit')->with('ebic', $ebic)->with('lista_beca', $lista_beca)->with('lista_empleados', $lista_empleados)->with('lista_instituciones', $lista_instituciones)->with('lista_capacitaciones', $lista_capacitaciones);
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
        $ebic = Ebic::find($id);
        $ebic->fill($request->all());

        //disminuye en -1 la cantidad de cupo de la capacitacion modificada
        $cpc = $ebic->id_capacitacion;
        $cpc2 = capacitacion::find($cpc);
        $cpc2->cupos = $cpc2->cupos - 1;
        $cpc2->save();

        $ebic->save();

        Session::flash('message_success', "Se ha modificado la capacitacion $ebic->id exitosamente!");
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
        $ebic = Ebic::find($id);
        $ebic->delete();

        Session::flash('message_danger', "Se ha eliminado la capacitacion $ebic->id exitosamente!");
        return redirect(route('admin.ebic.index'));
    }
}
