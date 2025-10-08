<?php

namespace App\Http\Controllers\Employee;

use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
// use App\Services\Vrams\Travel\SaveClass;
use App\Services\Employee\Request\SaveClass;
use App\Services\Employee\Request\ViewClass;
use App\Services\Employee\Request\ShowClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\Vrams\TravelRequest;
use App\Services\Hr\Cto\SaveClass as CTO;
use App\Services\Hr\Leave\SaveClass as Leave;
use App\Http\Requests\Employee\MyrequestRequest;

class RequestController extends Controller
{
    use HandlesTransaction;

    public $view,$save,$dropdown,$show;

    public function __construct(SaveClass $save, ViewClass $view, ShowClass $show, DropdownClass $dropdown, 
        CTO $cto, Leave $leave){
        $this->cto = $cto;
        $this->leave = $leave;
        $this->view = $view;
        $this->save = $save;
        $this->show = $show;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            case 'print':
                // return $this->view->print($request);
            break;
            default:
                return inertia('Modules/Employee/Requests/Index',[
                    'counts' => $this->view->counts($this->dropdown->datas('Request Type')),
                    'dropdowns' => [
                        'requests' => $this->dropdown->datas('Request Type'),
                        'statuses' => $this->dropdown->statuses('Request'),
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
                        'regions' => $this->dropdown->regions()
                    ],
                    'vehicle_dropdowns' => [
                        'transportations' => $this->dropdown->datas('Public Conveyance'),
                        'regions' => $this->dropdown->regions()
                    ]
                ]); 
        }   
    }

    public function store(MyrequestRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'cto':
                    return $this->cto->store($request);
                break;
                case 'leave':
                    return $this->leave->store($request);
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

    public function show($string){
        $string = Crypt::decryptString($string);
        $parts = explode("krad", $string);
   
        $type = $parts[0]; 
        $code  = $parts[1]; 
        switch($type){
            case 'travel-order':
                return inertia('Modules/Employee/Requests/View/Travels/View',[
                    'information_data' => $this->show->travel($code)
                ]);
            break;
            case 'vehicle-reservation':
                return inertia('Modules/Employee/Requests/View/Reservations/View',[
                    'information_data' => $this->show->reservation($code)
                ]);
            break;
            case 'leave-form':
                return inertia('Modules/Employee/Requests/View/Leaves/View',[
                    'information_data' => $this->show->leave($code)
                ]);
            break;
        }
    }

    public function update(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'Update':
                    return $this->save->update($request);
                break;
                case 'overtime':
                    return $this->save->overtime($request);
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
