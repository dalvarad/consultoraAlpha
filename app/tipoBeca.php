<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoBeca extends Model
{
    protected $table ="tipoBeca";

    protected $fillable=['tipo_beca'];

    public function tipoBeca(){
    	return $this->hasMany('App\beca');
    }
}
