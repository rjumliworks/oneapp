<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationOther extends Model
{
    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation', 'reservation_id', 'id');
    }
}
