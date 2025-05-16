<?php

namespace App\Http\Controllers\Hr;

use App\Traits\HandlesTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DropdownClass;
use App\Services\Hr\Calendar\SaveClass;
use App\Services\Hr\Calendar\ViewClass;

class CalendarController extends Controller
{
    use HandlesTransaction;

    public $view,$save,$dropdown;

    public function __construct(SaveClass $save, ViewClass $view, DropdownClass $dropdown){
        $this->view = $view;
        $this->save = $save;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                // return $this->view->lists($request);
                return [];
            break;
            default:
                return inertia('Modules/HumanResource/Calendar/Index'); 
        }   
    }
}
