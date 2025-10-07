<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetEquipment extends Model
{
    protected $fillable = [
        'code',
        'name',
        'brand',
        'model',
        'price',
        'acquired_at',
        'maintenance_plan',
        'status_id',
        'user_id',
    ];

    public function logs()
    {
        return $this->hasMany('App\Models\AssetEquipmentLog', 'equipment_id')->orderBy('created_at','DESC');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\ListStatus', 'status_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function location()
    {
        return $this->hasOne('App\Models\AssetEquipmentLocation', 'equipment_id');
    }

     public function setPriceAttribute($value)
    {
        $this->attributes['price'] = trim(str_replace(',','',$value),'₱');
    }

    public function getPriceAttribute($value)
    {
        return '₱'.number_format($value,2,'.',',');
    }

}
