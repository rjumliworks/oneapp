<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestSignatory extends Model
{
    protected $fillable = [
        'is_completed',
        'is_approval_only',
        'approved_id',
        'approved_date',
        'recommended_id',
        'recommended_date',
        'division_id',
        'request_id'
    ];

    public function recommended()
    {
        return $this->belongsTo('App\Models\User', 'recommended_id', 'id');
    }

    public function approved()
    {
        return $this->belongsTo('App\Models\User', 'approved_id', 'id');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'division_id', 'id');
    }

    public function request()
    {
        return $this->belongsTo('App\Models\Request', 'request_id', 'id');
    }
}
