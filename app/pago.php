<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    protected $table ="pago";

    protected $fillable=['estado','monto','fecha_pago','fecha_vencimiento','id_beca'];

    public function beca(){
    	return $this->belongTo('App\beca');
    }
}
