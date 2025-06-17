<?php

namespace App\Http\Controllers;

use App\Models\OldDtr;
use App\Models\OldUser;
use App\Models\User;
use App\Models\Employee;
use Carbon\Carbon;
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
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString(); // e.g., '2025-06-01'
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();     // e.g., '2025-06-30'
        $dtrs = OldDtr::with('user')->whereBetween('date', [$startOfMonth, $endOfMonth])->get();
        return $dtrs;
        $time = Carbon::createFromTimestamp(1464755682)->format('H:i:s'); // Output: 16:47:39


        // $employees = Employee::where('is_active',1)->get();
        // foreach($employees as $employee){
        //     $user = User::create([
        //         'username' => $employee->username,
        //         'email' => ($employee->email) ? $employee->email : $employee->username.'@gmail.com',
        //         'password' => bcrypt($employee->username.'!@#$%'),
        //         'created_at' => $employee->created_at,
        //         'updated_at' => $employee->updated_at,
        //     ]);
        //     if($user){
        //         $profile = $user->profile()->create([
        //             'firstname' => $employee->first_name,
        //             'middlename' => $employee->middle_name,
        //             'lastname' => $employee->last_name,
        //             'suffix' => $employee->name_suffix,
        //             'sex' => 'Male',
        //             'birthdate' => now(),
        //             'contact_no' => '09123456789',
        //             'avatar' => ($employee->picture) ? $employee->picture : 'avatar.jpg',
        //             'signature' => ($employee->signature) ? $employee->signature : 'signature.jpg',
        //             'marital_id' => 1,
        //             'religion_id' => 1,
        //             'blood_id' => 1,
        //         ]);

        //         if($profile){
        //             $user->organization()->create([
        //                 'status_id' => 2,
        //                 'type_id' => $this->status($employee->employee_status_id),
        //                 'position_id' => 1,
        //                 'division_id' => 1,
        //                 'unit_id' => 1,
        //                 'station_id' => 1
        //             ]);
        //         }
        //     }
            
        // }

        if(!\Auth::check()){
            return inertia('Auth/Login');
        }else{
            return inertia('Modules/Executive/Dashboard/Index');
        }
    }

    public function status($status){
        switch($status){
            case '3':
                return 15;
            break;
            case '2':
                return 17;
            break;
            case '1':
                return 16;
            break;
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
