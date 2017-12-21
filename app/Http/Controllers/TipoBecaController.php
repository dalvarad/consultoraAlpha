<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipobeca;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class TipoBecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function __construct()
     {
         $this->middleware('admin', ['only' => ['index','create','store', 'edit', 'update', 'destroy']]);
     }
    public function index()
    {
           $tipobeca = \DB::table('tipobeca')
                  ->select('tipobeca.*')
                  ->orderBy('tipobeca.id','DESC')
                  ->get();

        return view('tipobeca.index')->with('tipobeca', $tipobeca);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipobeca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipobeca = new tipobeca($request->all());
        

        $tipobeca->save();

        Session::flash('message_success', "Se ha registrado el nuevo tipo beca $tipobeca->tipo_beca Exitosamente!");

            return redirect(route('tipobeca.index'));
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
         $tipobeca = tipobeca::find($id);
        return view('tipobeca.edit')->with('tipobeca', $tipobeca);
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
        $tipobeca = tipobeca::find($id);
        $tipobeca->tipo_beca = $request->tipo_beca;
      
        $tipobeca->save();

        return redirect()->route('tipobeca.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipobeca = tipobeca::find($id);
        $tipobeca->delete();    

        Session::flash('message_danger', "Se ha eliminado el tipo de beca $tipobeca->tipo_beca Exitosamente!");
        return redirect(route('tipobeca.index'));
    }
}
