<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListVehicle extends Model
{
    public function reservations()
    {
       return $this->hasMany('App\Models\Reservation', 'vehicle_id');
    }
}
