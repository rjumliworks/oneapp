<?php

namespace App\Http\Controllers\Hr;

use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Services\Hr\Employee\SaveClass;
use App\Services\Hr\Employee\ViewClass;
use App\Services\Hr\Employee\UpdateClass;

class EmployeeController extends Controller
{
    use HandlesTransaction;

    public function __construct(SaveClass $save, ViewClass $view, UpdateClass $update, DropdownClass $dropdown){
        $this->view = $view;
        $this->save = $save;
        $this->update = $update;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            default:
                return inertia('Modules/HumanResource/Employees/Index',[
                    'dropdowns' => [
                        'bloods' => $this->dropdown->bloods(),
                        'religions' => $this->dropdown->religions(),
                        'maritals' => $this->dropdown->maritals(),
                        'divisions' => $this->dropdown->divisions(),
                        'stations' => $this->dropdown->stations(),
                        'positions' => $this->dropdown->positions(),
                        'salaries' => $this->dropdown->salaries(),
                        'statuses' => $this->dropdown->statuses(),
                        'employment_statuses' => $this->dropdown->employment_statuses()
                    ],
                    'counts' => $this->view->counts()
                ]); 
        }   
    }

    public function store(EmployeeRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'employee':
                    return $this->save->store($request);
                break;
                case 'credential':
                    return $this->save->credential($request);
                break;
                case 'academic':
                    return $this->save->academic($request);
                break;
                case 'deduction':
                    return $this->save->deduction($request);
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

    public function update(EmployeeRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'employee':
                    return $this->save->update($request);
                break;
                case 'background':
                    return $this->update->background($request);
                break;
                case 'account':
                    return $this->update->account($request);
                break;
                case 'salary':
                    return $this->update->salary($request);
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
        return inertia('Modules/HumanResource/Employees/View',[
            'employee_data' => $this->view->view($code),
            'dropdowns' => [
                'eligibilities' => $this->dropdown->eligibilities(),
                'licenses' => $this->dropdown->licenses(),
                'levels' => $this->dropdown->levels(),
                'types' => $this->dropdown->types(),
                'divisions' => $this->dropdown->divisions(),
                'stations' => $this->dropdown->stations(),
                'positions' => $this->dropdown->positions(),
                'salaries' => $this->dropdown->salaries(),
                'deductions' => $this->dropdown->deductions(),
                'employment_statuses' => $this->dropdown->employment_statuses()
            ],
        ]);
    }
}
