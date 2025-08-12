<?php

namespace App\Http\Controllers\Hr;

use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Hr\Payroll\SaveClass;
use App\Services\Hr\Payroll\ViewClass;
use App\Services\Hr\Payroll\SearchClass;
use App\Services\Hr\Payroll\UpdateClass;
use App\Http\Requests\HumanResource\PayrollRequest;

class PayrollController extends Controller
{
    use HandlesTransaction;

    public function __construct(SaveClass $save, ViewClass $view, UpdateClass $update, SearchClass $search, DropdownClass $dropdown){
        $this->save = $save;
        $this->view = $view;
        $this->update = $update;
        $this->search = $search;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            case 'payrolls':
                return $this->view->payroll($request);
            break;
            case 'print':
                return $this->view->print($request);
            break;
            case 'search':
                return $this->search->user($request);
            break;
            default:
                return inertia('Modules/HumanResource/Payrolls/Index',[
                    'dropdowns' => [
                        'payrolls' => $this->dropdown->dropdowns('Payroll')
                    ]
                ]); 
        }   
    }

    public function store(PayrollRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'cycle':
                    return $this->save->cycle($request);
                break;
                case 'deduction':
                    return $this->save->deduction($request);
                break;
                case 'users':
                    return $this->save->users($request);
                break;
                case 'remove':
                    return $this->save->remove($request);
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

    public function update(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'payroll':
                    return $this->update->payroll($request);
                break;
                case 'deduction':
                    return $this->update->deduction($request);
                break;
                 case 'delete':
                    return $this->update->delete($request);
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
            'payroll_data' => $this->view->view($code),
            'dropdowns' => [
                'deductions' => $this->dropdown->deductions(),
            ]
        ]);
    }
}
