<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentComment extends Model
{
    protected $fillable = [
        'comment','is_seen','user_id'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphMany('App\Models\DocumentComment', 'commentable');
    }

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
        return date('M d, Y g:i a', strtotime($value));
    }
}
