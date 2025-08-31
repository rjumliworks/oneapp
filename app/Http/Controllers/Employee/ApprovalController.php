<?php

namespace App\Http\Controllers\Employee;

use App\Traits\HandlesTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Employee\Approval\ViewClass;

class ApprovalController extends Controller
{
    use HandlesTransaction;

    public $view;

    public function __construct(ViewClass $view){
        $this->view = $view;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            default:
                return inertia('Modules/Employee/Approvals/Index'); 
        }   
    }
}
