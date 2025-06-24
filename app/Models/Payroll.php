<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = ['user_id','cutoff_id','netpay','deduction','gross'];

    public function cutoff()
    {
        return $this->belongsTo('App\Models\PayrollCutoff', 'cutoff_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

     public function deductions()
    {
        return $this->hasMany('App\Models\PayrollDeduction', 'payroll_id');
    }

    public function setGrossAttribute($value)
    {
        $this->attributes['gross'] = trim(str_replace(',','',$value),'₱');
    }

    public function getGrossAttribute($value)
    {
        return '₱'.number_format($value,2,'.',',');
    }

    public function setNetpayAttribute($value)
    {
        $this->attributes['netpay'] = trim(str_replace(',','',$value),'₱');
    }

    public function getNetpayAttribute($value)
    {
        return '₱'.number_format($value,2,'.',',');
    }

    public function setDeductionAttribute($value)
    {
        $this->attributes['deduction'] = trim(str_replace(',','',$value),'₱');
    }

    public function getDeductionAttribute($value)
    {
        return '₱'.number_format($value,2,'.',',');
    }
}
