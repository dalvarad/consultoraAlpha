<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usertype extends Model
{
    protected $table ="usertype";

    protected $fillable=['name_type'];

    public function user(){
    	return $this->hasMany('App\User');
    }
}
