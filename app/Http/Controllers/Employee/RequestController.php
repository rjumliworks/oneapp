<?php

namespace App\Http\Controllers\Employee;

use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Services\Vrams\Travel\SaveClass;
use App\Services\Employee\Request\ViewClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Vrams\TravelRequest;

class RequestController extends Controller
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
                return $this->view->lists($request);
            break;
            case 'print':
                return $this->view->print($request);
            break;
            default:
                return inertia('Modules/Employee/Requests/Index',[
                    'counts' => $this->view->counts($this->dropdown->datas('Request Type')),
                    'dropdowns' => [
                        'requests' => $this->dropdown->datas('Request Type'),
                    ],
                    'leave_dropdowns' => [
                        'leaves' => $this->dropdown->leaves(),
                        'details' => $this->dropdown->dropdowns('Leave Details'),
                        'options' => $this->view->credits(),
                    ],
                    'travel_dropdowns' => [
                        'modes' => $this->dropdown->datas('Travel'),
                        'expenses' => $this->dropdown->datas('Travel Expense'),
                        'transportations' => $this->dropdown->datas('Public Conveyance'),
                        'statuses' => $this->dropdown->statuses('Request'),
                        'regions' => $this->dropdown->regions()
                    ],
                    'vehicle_dropdowns' => [
                        'transportations' => $this->dropdown->datas('Public Conveyance'),
                        'statuses' => $this->dropdown->statuses('Request'),
                        'regions' => $this->dropdown->regions()
                    ]
                ]); 
        }   
    }

    public function store(TravelRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->save->travel($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }

    public function show($code){
        switch($code){
            case 'calendar':
                return inertia('Modules/Vrams/Calendar/Index');
            break;
            default:
                return inertia('Modules/Vrams/Travels/View',[
                    'information_data' => $this->view->show($code)
                ]);
        }
    }

    public function update(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'Update':
                    return $this->save->update($request);
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
}
