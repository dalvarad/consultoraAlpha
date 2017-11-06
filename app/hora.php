<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hora extends Model
{
    protected $table ="hora";

    protected $fillable=['hora_inicio','hora_fin'];
}
