<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\institucion;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;



class InstitucionController extends Controller{


public function index()
    {

    	$institucion = institucion::orderBy('id','ASC')->paginate(5);
    	
     
        return view('admin.institucion.index')->with('institucion', $institucion);

 
    }


    public function create()
    {
    	return view('admin.institucion.create');
    
    }


    public function store(request $request)
    {

    
    	$institucion = new institucion($request->all());
    	

    	$institucion->save();

        Session::flash('message_success', "Se ha registrado el tipo $institucion->nombre Exitosamente!");

     	    return redirect(route('admin.institucion.index'));

    }

    public function show($id){

        //
    }

      public function edit($id){
        $institucion = institucion::find($id);
        return view('admin.institucion.edit')->with('institucion', $institucion);
    }

    public function update(Request $request, $id){
        
        $institucion = institucion::find($id);

        /*Valido manualmente con las mismas reglas de UsersRequest, 
        ya que si utilizo UsersRequest me obliga usar el arreglo completo, 
        y en este caso, solo valido los campos que necesito*/
     

        $institucion->nombre = $request->nombre;
        $institucion->direccion = $request->direccion;
    

        $institucion->save();
        
        Session::flash('message_success', "Se ha modificado el usuario $institucion->nombre Exitosamente!");
        return redirect(route('admin.institucion.index'));
     
    }

    public function destroy($id){
        $institucion = institucion::find($id);
        $institucion->delete();    

        Session::flash('message_danger', "Se ha eliminado el usuario $institucion->nombre Exitosamente!");
        return redirect(route('admin.institucion.index'));
    }
}