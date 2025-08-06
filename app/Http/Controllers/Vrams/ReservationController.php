<?php

namespace App\Http\Controllers\Vrams;

use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Services\Vrams\Reservation\SaveClass;
use App\Services\Vrams\Reservation\ViewClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Vrams\ReservationRequest;

class ReservationController extends Controller
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
                return $this->view->reservation($request);
            break;
            default:
                return inertia('Modules/Vrams/Reservations/Index',[
                    'counts' => $this->view->counts($this->dropdown->statuses('Request')),
                    'dropdowns' => [
                        'transportations' => $this->dropdown->datas('Public Conveyance'),
                        'statuses' => $this->dropdown->statuses('Request'),
                        'regions' => $this->dropdown->regions()
                    ]
                ]); 
        }   
    }

    public function store(ReservationRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->save->reservation($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }

    public function show($code){
        return inertia('Modules/Vrams/Reservations/View',[
            'information_data' => $this->view->show($code)
        ]);
    }
}
