<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request){
        switch($request->option){
            case 'schedules':
                return '';
            break;
            default :
            return inertia('Modules/Employee/Schedules/Index');
        }
    }
}
