<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DropdownClass;

class DashboardController extends Controller
{
    public function __construct(
            DropdownClass $dropdown,

        ){
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        if(!\Auth::check()){
            return inertia('Auth/Login');
        }else{
            return inertia('Modules/Executive/Dashboard/Index');
        }
    }

    public function search(Request $request){
        $option = $request->option;
        switch($option){
            case 'provinces':
                return $this->dropdown->provinces($request->code);
            break;
            case 'municipalities':
                return $this->dropdown->municipalities($request->code);
            break;
            case 'barangays':
                return $this->dropdown->barangays($request->code);
            break;
            case 'units':
                return $this->dropdown->units($request->code);
            break;
            case 'users':
                return $this->dropdown->users($request->keyword);
            break;
        }
    }
}
