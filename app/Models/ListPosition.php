<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'special_id', 'administrative_id','salary_id'
    ];

    public function special()
    {
        return $this->belongsTo('App\Models\ListData', 'special_id', 'id');
    }

    public function administrative()
    {
        return $this->belongsTo('App\Models\ListData', 'administrative_id', 'id');
    }

    public function salary()
    {
        return $this->belongsTo('App\Models\ListSalary', 'salary_id', 'id');
    }
}
