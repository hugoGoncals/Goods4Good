<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linedonation extends Model
{
    protected $fillable = array('id','iddonation','idbasket','quantity','value');
}
