<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\userType;
use DB;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index()
    {

    	   $users =  DB::table('users')
                  ->join('usertype', 'usertype.id', '=', 'users.id_user_type' )
                  ->select('users.*','usertype.name_type')
                  ->orderBy('users.id','DESC')
                  ->get();

     
        return view('admin.users.index')->with('users', $users);
    }


    public function create()
    {
    	     $lista_tipo= DB::table('usertype')
                     ->orderBy('id')
                     ->lists('name_type');
    	return view('admin.users.create')->with('lista_tipo',$lista_tipo);
    
    }


    public function store(request $request)
    {

    	$users = new User($request->all());
    	$users->password = bcrypt($request->password);
       
        
    	$users->save();

        Session::flash('message_success', "Se ha registrado el usuario $users->name Exitosamente!");

         return redirect(route('admin.users.index'));

    }

    public function show($id){

        //
    }

      public function edit($id){
        $users = User::find($id);
        return view('admin.users.edit')->with('users', $users);
    }

    public function update(Request $request, $id){
        
        $users = User::find($id);

        /*Valido manualmente con las mismas reglas de UsersRequest, 
        ya que si utilizo UsersRequest me obliga usar el arreglo completo, 
        y en este caso, solo valido los campos que necesito*/
        
        $this->validate($request,[
            'name' => 'min:4|max:120|required',
            'email' => 'required',
            'id_user_type' => 'required'
        ]);

        $users->name = $request->name;
        $users->email = $request->email;
        $users->id_user_type = $request->id_user_type;

        $users->save();
        
        Session::flash('message_success', "Se ha modificado el usuario $users->name Exitosamente!");
        return redirect(route('admin.users.index'));
     
    }

    public function destroy($id){
        $users = User::find($id);
        $users->delete();    

        Session::flash('message_danger', "Se ha eliminado el usuario $users->name Exitosamente!");
        return redirect(route('admin.users.index'));
    }
}
