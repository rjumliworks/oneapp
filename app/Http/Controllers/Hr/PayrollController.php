<?php

namespace App\Http\Controllers\Hr;

use App\Traits\HandlesTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Hr\Payroll\SaveClass;
use App\Services\Hr\Payroll\ViewClass;
use App\Services\Hr\Payroll\UpdateClass;

class PayrollController extends Controller
{
    use HandlesTransaction;

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
            case 'payrolls':
                return $this->view->payroll($request);
            break;
            default:
                return inertia('Modules/HumanResource/Payrolls/Index'); 
        }   
    }

    public function store(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'cycle':
                    return $this->save->cycle($request);
                break;
            }
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }

    public function show($code){
        return inertia('Modules/HumanResource/Payrolls/View',[
            'payroll_data' => $this->view->view($code)
        ]);
    }
}
