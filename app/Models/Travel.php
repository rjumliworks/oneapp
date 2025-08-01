<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory, LogsActivity;
    
    protected $table = 'travels';

    protected $fillable = [
        'purpose',
        'destination',
        'remarks',
        'start',
        'end',
        'time',
        'document',
        'mode_id',
        'expense_id',
        'request_id',
        'expenses'
    ];

    protected $casts = [
        'expenses' => 'array'
    ];
    
    public function mode()
    {
        return $this->belongsTo('App\Models\ListData', 'mode_id', 'id');
    }

    public function expense()
    {
        return $this->belongsTo('App\Models\ListData', 'expense_id', 'id');
    }

    public function request()
    {
        return $this->belongsTo('App\Models\Request', 'request_id', 'id');
    }

    public function getStartAttribute($value)
    {
        return date('F d, Y', strtotime($value));
    }

    public function getEndAttribute($value)
    {
        return date('F d, Y', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('F d, Y g:i a', strtotime($value));
    }

    protected static $expenseLabels = [
        1 => 'Accommodation (Actual)',
        2 => 'Accommodation (Per Diem)',
        3 => 'Incidental Expenses',
        4 => 'Meals',
    ];

    public function getExpenseItemsAttribute()
    {
        return collect($this->expenses)->map(function ($id) {
            return [
                'id' => (int) $id,
                'name' => self::$expenseLabels[$id] ?? 'Unknown',
            ];
        });
    }

    public function getTimeAttribute($value)
    {
        return Carbon::parse($value)->format('g:i A'); 
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
            'purpose',
            'destination',
            'remarks',
            'start',
            'end',
            'time',
            'document',
            'mode_id',
            'expense_id',
            'request_id',
            'expenses'
        ])
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName}")
        ->useLogName('Travel Order')
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
