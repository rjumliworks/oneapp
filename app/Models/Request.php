<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
     use HasFactory, LogsActivity;

    protected $fillable = [
        'code',
        'is_completed',
        'is_sender_viewed',
        'is_receiver_viewed',
        'type_id',
        'user_id',
        'status_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\ListData', 'type_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\ListStatus', 'status_id', 'id');
    }

    public function statuses()
    {
        return $this->hasMany('App\Models\RequestStatus', 'request_id');
    }

    public function tags()
    {
        return $this->hasMany('App\Models\RequestTag', 'request_id');
    }

    public function detail()
    {
        return $this->hasOne('App\Models\RequestDetail', 'request_id');
    }

    public function location()
    {
        return $this->hasOne('App\Models\RequestLocation', 'request_id');
    }

    public function dates()
    {
        return $this->hasMany('App\Models\RequestDate', 'request_id');
    }

    public function travels()
    {
        return $this->hasMany('App\Models\Travel', 'request_id');
    }

    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation', 'request_id');
    }

    public function updateIfDirty(array $attributes){
        $this->fill($attributes);
        $dirtyAttributes = $this->getDirty();
        if(!empty($dirtyAttributes)) {
            $originalAttributes = array_intersect_key($this->getOriginal(), $dirtyAttributes);
            $updated = $this->update($dirtyAttributes);
            return $updated;
        }
        return false;
    }

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()
        ->logOnly([
            'code',
            'is_completed',
            'is_sender_viewed',
            'is_receiver_viewed',
            'type_id',
            'user_id',
            'status_id'
        ])
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName}")
        ->useLogName('Request')
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
