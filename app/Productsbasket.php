<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productsbasket extends Model
{
    protected $fillable = array('id','name','price','priority');
}
