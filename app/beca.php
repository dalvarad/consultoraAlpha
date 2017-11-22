<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beca extends Model
{
    protected $table ="beca";

    protected $fillable=['porcentaje','id_tipo_beca'];

    public function tipoBeca(){
    	return $this->belongsTo('App\tipoBeca');
    }

    public function pago(){
    	return $this->hasMany('App\pago');
    }

//tabla pibote

    protected $table = "empleado_beca_institucion_capacitacion";

    protected $fillable = ['id_empleado', 'id_beca', 'id_institucion', 'id_capacitacion'];

    public function capacitacion(){
    	return $this->belongsToMany('App\capacitacion')->witchTimestamp();
    }

    public function institucion(){
    	return $this->belongsToMany('App\institucion');
    }

    public function empleado(){
    	return $this->belongsToMany('App\empleado');
    }
}
