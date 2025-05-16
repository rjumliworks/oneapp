<?php

namespace App\Http\Controllers\Trace;

use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownClass $dropdown){
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            default:
                return inertia('Modules/Trace/Documents/Index',[
                    'dropdowns' => [
                        'types' => $this->dropdown->doctypes(),
                        'actions' => $this->dropdown->docactions()
                    ]
                ]); 
        }   
    }
}
