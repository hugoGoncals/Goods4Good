<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badget extends Model
{
    protected $fillable = array('id','description','min_value');
}
