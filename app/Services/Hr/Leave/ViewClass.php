<?php

namespace App\Services\Hr\Leave;

use App\Models\ListLeave;
use App\Models\UserCredit;

class ViewClass
{
    public function credits()
    {
        $year = now()->year;
        $user_id = \Auth::user()->id;
        $is_regular = (\Auth::user()->organization()->type_id == 15) ? true : false;

        $credit = UserCredit::where('leave_id',$leave->id)->where('user_id',$user_id)->where('is_active',1)->where('year',$year)->first();
    }
}
