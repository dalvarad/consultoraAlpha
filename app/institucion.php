<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institucion extends Model
{
    protected $table ="institucion";

    protected $fillable=['nombre','direccion'];

    public function beca(){
    	return $this->belongsToMany('App\beca');
    }

    public function capacitacion(){
    	return $this->belongsToMany('App\capacitacion');
    }

    public function empleado(){
    	return $this->belongsToMany('App\empleado');
    }
}
