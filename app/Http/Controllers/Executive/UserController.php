<?php

namespace App\Http\Controllers\Executive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->travel($request);
            break;
            default:
                return inertia('Modules/Administrator/Users/Index',[
                    'counts' => $this->view->counts($this->dropdown->statuses('Request')),
                    'dropdowns' => [
                        'modes' => $this->dropdown->datas('Travel'),
                        'expenses' => $this->dropdown->datas('Travel Expense'),
                        'transportations' => $this->dropdown->datas('Public Conveyance'),
                        'statuses' => $this->dropdown->statuses('Request'),
                        'regions' => $this->dropdown->regions()
                    ]
                ]); 
        }   
    }
}
