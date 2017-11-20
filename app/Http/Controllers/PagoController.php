<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pago;
use DB;
use Illuminate\Support\Facades\Session;

class PagoController extends Controller
{
    public function index()
    {
    	$pago = DB::table('pago')
    			->join('beca', 'beca.id', '=', 'pago.id_beca' )
                ->select('pago.*','beca.porcentaje')
                ->orderBy('pago.id','DESC')
                ->get();

        return view('admin.pago.index')->with('pago', $pago);
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

        return view('admin.pago.create')->with('lista_beca',$lista_beca);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pago = new pago($request->all());
        
    	$pago->save();

        Session::flash('message_success', "Se ha registrado el pago $pago->id exitosamente!");

         return redirect(route('admin.pago.index'));
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
        $pago = pago::find($id);
        $lista_beca = DB::table('beca')
        			  ->orderBy('id')
        			  ->lists('id','porcentaje');
        return view('admin.pago.edit')->with('pago', $pago)->with('lista_beca', $lista_beca);
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
        $pago = pago::find($id);
        $pago->fill($request->all());
        $pago->save();

        Session::flash('message_success', "Se ha modificado el pago $pago->id exitosamente!");
        return redirect(route('admin.pago.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pago = Reserva::find($id);
        $pago->delete();

        Session::flash('message_danger', "Se ha eliminado el pago $pago->id exitosamente!");
        return redirect(route('admin.pago.index'));
    }
}
