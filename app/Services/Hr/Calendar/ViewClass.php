<?php

namespace App\Services\Hr\Calendar;

use App\Models\Schedule;
use App\Http\Resources\Hr\ScheduleResource;

class ViewClass
{
    public function events($request){
        $data = Schedule::with('user','event')->get();
        return ScheduleResource::collection($data);
    }

}
