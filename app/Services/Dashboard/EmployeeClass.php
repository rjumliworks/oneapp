<?php

namespace App\Services\Dashboard;

use App\Models\Dtr;
use App\Http\Resources\Hr\DtrResource;

class EmployeeClass
{
    public function __construct()
    {
        $this->user  = \Auth::user()->id;
    }

    public function dashboard(){
        return [
            'dtr' => new DtrResource(Dtr::whereDate('date',now())->where('user_id',$this->user)->first())
        ];
    }
}
