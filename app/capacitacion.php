<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class capacitacion extends Model
{
    //
    protected $table="capacitacion";
  //  protected $primarykey = 'id';

    protected $fillable=['nombre','cupos','fecha_inicio','fecha_fin','duracion'];


    public function beca(){
    	return $this->belongsToMany('App\beca');
    }

    public function institucione(){
    	return $this->belongsToMany('App\institucion');
    }

    public function empleado(){
    	return $this->belongsToMany('App\empleado');
    }
}
