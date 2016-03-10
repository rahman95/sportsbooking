<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    protected $table = 'facility';

    protected $fillable = array('facilitytype', 'bookingdate', 'bookingtime', 'bookedby');
}
