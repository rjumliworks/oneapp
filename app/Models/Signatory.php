<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signatory extends Model
{
    protected $fillable = [
        'start',
        'end',
        'is_oic',
        'is_active',
        'designation_id',
        'division_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'designation_id', 'id');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'division_id', 'id');
    }
}
