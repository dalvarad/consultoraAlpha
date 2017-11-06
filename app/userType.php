<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userType extends Model
{
    protected $table ="userType";

    protected $fillable=['name_type'];

    public function user(){
    	return $this->hasMany('App\user');
    }
}
