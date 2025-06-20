<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Hr\Payroll\SaveClass;
use App\Services\Hr\Payroll\ViewClass;
use App\Services\Hr\Payroll\UpdateClass;

class PayrollController extends Controller
{
    public function __construct(SaveClass $save, ViewClass $view, UpdateClass $update){
        $this->save = $save;
        $this->view = $view;
        $this->update = $update;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            default:
                return inertia('Modules/HumanResource/Payrolls/Index'); 
        }   
    }
}
