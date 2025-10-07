<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetEquipmentLog extends Model
{
    protected $fillable = [
        'date',
        'note',
        'next_date',
        'equipment_id',
        'user_id'
    ];

    public function equipment()
    {
        return $this->belongsTo('App\Models\AssetEquipment', 'equipment_id', 'id');
    }

     public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}
