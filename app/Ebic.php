<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebic extends Model
{
    protected $table ="ebic";

    protected $fillable=['id_empleado','id_beca', 'id_institucion', 'id_capacitacion'];

    public function empleado(){
    	return $this->belongsTo('App\empleado');
    }

    public function beca(){
    	return $this->belongsTo('App\beca');
    }

    public function institucion(){
    	return $this->belongsTo('App\institucion');
    }

    public function capacitacion(){
    	return $this->belongsTo('App\capacitacion');
    }
}
