<?php

namespace App\Http\Controllers\Hr;

use App\Traits\HandlesTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Hr\Dtr\SaveClass;
use App\Services\Hr\Dtr\ViewClass;
use App\Services\Hr\Dtr\UpdateClass;

class DtrController extends Controller
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
            default:
                return inertia('Modules/HumanResource/Dtrs/Index'); 
        }   
    }

    public function store(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'dtr':
                    return $this->save->store($request);
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
                case 'dtr':
                    return $this->update->save($request);
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

    public function dtr(){
        return inertia('Modules/HumanResource/Dtrs/View'); 
    }
}
