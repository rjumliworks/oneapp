<?php

namespace App\Http\Controllers\Vrams;


use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Services\Vrams\TravelClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    use HandlesTransaction;

    public $view,$save,$dropdown;

    public function __construct(TravelClass $travel, DropdownClass $dropdown){
        $this->travel = $travel;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return [];
            break;
            default:
                return inertia('Modules/Vrams/Travels/Index',[
                    'dropdowns' => [
                        'modes' => $this->dropdown->modes(),
                        'expenses' => $this->dropdown->expenses()
                    ]
                ]); 
        }   
    }

    public function store(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->travel->save($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
