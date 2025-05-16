<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Dtr extends Model
{
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'am_in_at',
        'am_out_at',
        'pm_in_at',
        'pm_out_at',
        'is_updated',
        'remarks',
        'date'
    ];

    protected $casts = [
        'am_in_at' => 'encrypted:json', 
        'am_out_at' => 'encrypted:json', 
        'pm_in_at' => 'encrypted:json', 
        'pm_out_at' => 'encrypted:json',
        'remarks' => 'encrypted:json',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('F d, Y g:i a', strtotime($value));
    }

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()
        ->logOnly(['am_in_at','is_updated'])
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName} the user information")
        ->useLogName('User')
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
