<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $fillable = ['accounts','contacts','backgrounds','barangay_code','user_id'];

    protected $casts = [
        'accounts' => 'encrypted:json', 
        'contacts' => 'encrypted:json', 
        'backgrounds' => 'encrypted:json', 
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
