<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usertype;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;


class UsertypeController extends Controller
{
    

    public function index()
    {

    	$usertype = usertype::orderBy('id','ASC')->paginate(5);
    	
     
        return view('admin.usertype.index')->with('usertype', $usertype);
    }


    public function create()
    {
    	 
    	return view('admin.usertype.create');
    
    }


    public function store(request $request)
    {

    	$usertype = new usertype($request->all());
    	

    	$usertype->save();

        Session::flash('message_success', "Se ha registrado el tipo $usertype->type_name Exitosamente!");

     	    return redirect(route('admin.usertype.index'));
    }

    public function show($id){

        //
    }

      public function edit($id){
        $usertype = usertype::find($id);
        return view('admin.usertype.edit')->with('usertype', $usertype);
    }

    public function update(Request $request, $id)   
    {
        
        $usertype = usertype::find($id);
        $usertype->name_type = $request->name_type;
        $usertype->save();

        return redirect()->route('admin.usertype.index');
    }

    public function destroy($id){
        $usertype = usertype::find($id);
        $usertype->delete();    

        Session::flash('message_danger', "Se ha eliminado el usuario $usertype->name_type Exitosamente!");
        return redirect(route('admin.usertype.index'));
    }
}


