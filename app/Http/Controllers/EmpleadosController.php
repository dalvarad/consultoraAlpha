<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\empleado;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\Session;
use Freshwork\ChileanBundle\Rut;

class EmpleadosController extends Controller
{
    public function __construct()
     {
         $this->middleware('admin', ['only' => ['create','store', 'edit', 'update', 'destroy']]);
     }
    public function index(){
    	$empleado = empleado::orderBy('id','ASC')->paginate(10);
    	
     
        return view('admin.empleado.index')->with('empleado', $empleado);
    }

    public function create(){
    	return view('admin.empleado.create');
    }

    public function store(Request $request){
    	$empleado = new empleado($request->all());
    	$empleado->rut = Rut::parse($request->rut)->format(Rut::FORMAT_WITH_DASH);

    	$empleado->save();

    	Session::flash('message_success', "Se ha registrado el empleado $empleado->first_name $empleado->last_name exitosamente!");
    	return redirect(route('admin.empleado.index'));
    }

    public function show($id){
    	//
    }


    public function edit($id){
    	$empleado = empleado::find($id);
        return view('admin.empleado.edit')->with('empleado', $empleado);
    }

    public function update(Request $request, $id){
    	$empleado = empleado::find($id);
    	$this->validate($request,[
            'rut' => 'cl_rut'
        ]);
    	$empleado->first_name = $request->first_name;
    	$empleado->last_name = $request->last_name;
    	$empleado->save();

    	Session::flash('message_success', "Se ha modificado el empleado $empleado->first_name $empleado->last_name  exitosamente!");
        return redirect(route('admin.empleado.index'));
    }

    public function destroy($id){
    	$empleado = empleado::find($id);
        $empleado->delete();    

        Session::flash('message_danger', "Se ha eliminado el empleado $empleado->first_name exitosamente!");
        return redirect(route('admin.empleado.index'));
    }
}
