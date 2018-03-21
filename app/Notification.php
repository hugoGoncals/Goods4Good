<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = array('id','subject','description','from','to','datesend','status');
}
