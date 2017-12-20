<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Session;

class queryController extends Controller
{
    public function index()
    {
    	$query = DB::table('ebic')
    			->join('institucion', 'institucion.id', '=', 'ebic.id_institucion' )
    			->join('empleado', 'empleado.id', '=', 'ebic.id_empleado')
    			->join('beca','beca.id', '=', 'ebic.id_beca')
    			->join('pago', 'pago.id_beca', '=', 'beca.id')
    			->join('capacitacion', 'capacitacion.id', '=', 'ebic.id_capacitacion')
                ->select('ebic.*','institucion.nombre_institucion','institucion.direccion','empleado.first_name', 'empleado.last_name', 'empleado.rut', 'beca.id_tipo_beca', 'beca.porcentaje', 'capacitacion.nombre_capacitacion', 'pago.*')
                ->orderBy('ebic.id','DESC')
                ->get();

        return view('admin.query.index')->with('query', $query);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
