<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'class';

    protected $fillable = array('classtype', 'bookingdate', 'bookingtime');
}
