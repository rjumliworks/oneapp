<?php

namespace App\Http\Controllers\HR;

use App\Services\DropdownClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Services\Hr\Leave\SaveClass;
use App\Services\Hr\Leave\ViewClass;

class LeaveController extends Controller
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
            default:
                return inertia('Modules/HumanResource/Leaves/Index',[
                    'dropdowns' => [
                        'leaves' => $this->dropdown->leaves(),
                        'details' => $this->dropdown->dropdowns('Leave Details')
                    ]
                ]); 
        }   
    }
}
