<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = array('id','description','price','quantity','idprovider','idcategory','idstatus');
}
