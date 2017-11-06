<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    protected $table ="empleado";

    protected $fillable=['first_name','last_name','rut'];

    public function institucion(){
    	return $this->belongsToMany('App\institucion');
    }

    public function beca(){
    	return $this->belongsToMany('App\beca');
    }

    public function capacitacion(){
    	return $this->belongsToMany('App\capacitacion');
    }
}
