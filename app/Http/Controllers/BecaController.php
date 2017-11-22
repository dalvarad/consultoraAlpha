<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\beca;
use App\tipobeca;
use DB;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class BecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $beca = DB::table('beca')
                  ->join('tipobeca', 'tipobeca.id', '=', 'beca.id_tipo_beca' )
                  ->select('beca.*','tipobeca.tipo_beca')
                  ->orderBy('beca.id','DESC')
                  ->get();

        return view('beca.index')->with('beca', $beca);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista_tipo = DB::table('tipobeca')
                     ->orderBy('id')
                     ->lists('tipo_beca', 'id');
        return view('beca.create')->with('lista_tipo',$lista_tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $beca = new beca($request->all());
       
        
        $beca->save();

        Session::flash('message_success', "Se ha registrado la beca Exitosamente!");

         return redirect(route('beca.index'));
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
         $beca = beca::find($id);
        return view('beca.edit')->with('beca', $beca);
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
         $beca = beca::find($id);
        $beca->porcentaje = $request->porcentaje;
        $beca->id_tipo_beca = $request->id_tipo_beca;
  
        $beca->save();

        return redirect()->route('beca.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beca = beca::find($id);
        $beca->delete();    

        Session::flash('message_danger', "Se ha eliminado la beca Exitosamente!");
        return redirect(route('beca.index'));
    }
}
