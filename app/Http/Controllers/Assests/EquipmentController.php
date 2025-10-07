<?php

namespace App\Http\Controllers\Assests;

use App\Traits\HandlesTransaction;
use App\Services\DropdownClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Assets\Equipments\SaveClass;
use App\Services\Assets\Equipments\ViewClass;

class EquipmentController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownClass $dropdown, ViewClass $view, SaveClass $save){
        $this->view = $view;
        $this->save = $save;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            default:
                return inertia('Modules/Assets/Equipments/Index',[
                    'dropdowns' => [
                        'stations' => $this->dropdown->stations(),
                    ]
                ]); 
        }   
    }

    public function store(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            if($request->option == 'perform'){
                return $this->save->perform($request);
            }else{
                return $this->save->save($request);
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
            if($request->option == 'disposed'){
                return $this->save->disposal($request);
            }else{
                return $this->save->update($request);
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
