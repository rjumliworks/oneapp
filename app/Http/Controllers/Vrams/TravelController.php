<?php

namespace App\Http\Controllers\Vrams;


use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Services\Vrams\Travel\SaveClass;
use App\Services\Vrams\Travel\ViewClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Vrams\TravelRequest;

class TravelController extends Controller
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
                return $this->view->travel($request);
            break;
            default:
                return inertia('Modules/Vrams/Travels/Index',[
                    'dropdowns' => [
                        'modes' => $this->dropdown->datas('Travel'),
                        'expenses' => $this->dropdown->datas('Travel Expense')
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
}
