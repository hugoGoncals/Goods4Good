<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = array('id','iduser','idstatus','data','totaldone');
}
