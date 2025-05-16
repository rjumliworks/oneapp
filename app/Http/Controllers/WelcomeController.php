<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use Illuminate\Support\Facades\Http;
use App\Services\DropdownClass;
use App\Jobs\SmsJob;

class WelcomeController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownClass $dropdown, SmsService $sms){
        $this->dropdown = $dropdown;
        $this->sms = $sms;
    }

    public function landing(){
        if(!\Auth::check()){
            return inertia('Auth/Login',[
                'dropdowns' => [
                    'laboratories' => $this->dropdown->laboratories(),
                    'types' => $this->dropdown->laboratory_all(),
                    'roles' => $this->dropdown->roles(),
                ]
            ]);
        }else{
            return inertia('Modules/Laboratory/Dashboard/Index',[
                'laboratories' => $this->dropdown->laboratory_types(),
            ]);
        }
    }

    public function index(){
        if(\Auth::check()){
            return inertia('Modules/Laboratory/Dashboard/Index',[
                'laboratories' => $this->dropdown->laboratory_types(),
            ]);
        }else{
            return inertia('Auth/Login');
        }
    }

    public function esms(){
        $contact = '09171531652';
        $message = "1 \n\n 2"; 
        dispatch(new SmsJob($contact, $message));
    }

}
