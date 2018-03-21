<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productsline extends Model
{
    protected $fillable = array('id','totalline','idproduct','quantity','idbasket');
}
