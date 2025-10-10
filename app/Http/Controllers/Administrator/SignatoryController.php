<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignatoryController extends Controller
{
    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return [];
            break;
            default:
                return inertia('Modules/Administrator/Signatories/Index'); 
        }   
    }
}
