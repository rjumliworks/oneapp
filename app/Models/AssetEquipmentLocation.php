<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetEquipmentLocation extends Model
{
     protected $fillable = [
        'location',
        'station_id',
        'personnel_id',
    ];

    public function station()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'station_id', 'id');
    }

    public function personnel()
    {
        return $this->belongsTo('App\Models\User', 'personnel_id', 'id');
    }
}
