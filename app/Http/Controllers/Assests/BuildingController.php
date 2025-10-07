<?php

namespace App\Http\Controllers\Assests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return [];
            break;
            default:
                return inertia('Modules/Assets/Buildings/Index'); 
        }   
    }
}
