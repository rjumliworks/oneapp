<?php

namespace App\Services\Hr\Employee;

use App\Models\User;
use App\Models\UserAcademic;
use App\Models\UserCredential;
use App\Models\UserInformation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SaveClass
{
    public function credential($request){
        $data = UserCredential::create($request->all());

        return [
            'data' => $data,
            'message' => 'Credential added successfully', 
            'info' => 'You can now manage this employee’s credentials',
        ];
    }

    public function academic($request){
        $data = UserAcademic::create($request->all());

        return [
            'data' => $data,
            'message' => 'Academic added successfully', 
            'info' => 'You can now manage this employee’s academics',
        ];
    }


    public function store($request){
        $data = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'is_active' => 1,
            'password' => Hash::make(Str::random(10))
        ]);
        if($data){
            $profile = $data->profile()->create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'suffix' => $request->suffix,
                'sex' => $request->sex,
                'contact_no' => $request->contact_no,
                'birthdate' => $request->birthdate,
                'marital_id' => $request->marital_id,
                'religion_id' => $request->religion_id,
                'blood_id' => $request->blood_id,
            ]);
            if($profile){
                $organization = $data->organization()->create([
                    'status_id' => 1,
                    'type_id' => $request->type_id,
                    'position_id' => $request->position_id,
                    'division_id' => $request->division_id,
                    'station_id' => $request->station_id,
                    'unit_id' => $request->unit_id,
                ]);
                if($organization){
                    $role = $data->myroles()->create([
                        'role_id' => 5,
                    ]);
                    if($role){
                        $this->information($data->id);
                    }
                }
            }
        }
        return [
            'data' => $data,
            'message' => 'Employee created successfully', 
            'info' => 'You can now manage this employee’s details in the system',
        ];
    }

    private function information($id){
        $accounts = [
            ["name" => "Pag-Ibig","number" => null,"deduction" => null, "is_contribution" => true],
            ["name" => "SSS","number" => null, "deduction" => null, "is_contribution" => true],
            ["name" => "GSIS", "number" => null, "deduction" => null, "is_contribution" => true],
            ["name" => "PhilHealth", "number" => null, "deduction" => null, "is_contribution" => true],
            ["name" => "TIN",  "number" => null, "deduction" => null, "is_contribution" => false],
            ["name" => "LandBank", "number" => null, "deduction" => null, "is_contribution" => false]
        ];
        
        $family = [
            "parents" => [
                "father" => [
                    "name" => null,
                    "address" => null,
                ],
                "mother" => [
                    "name" => null,
                    "address" => null,
                ]
            ],
            "spouse" => [
                "name" => null,
                "address" => null,
                "contact_no" => null,
                "occupation" => null,
                "company" => null,
            ],
            "children" => []
        ];

        $contacts = [
            "home_address" => [
                "region" => null,
                "province" => null,
                "municipality" => null,
                "barangay" => null,
                "street" => null,
                "zip_code" => null
            ],
            "permanent_address" => [
                "region" => null,
                "province" => null,
                "municipality" => null,
                "barangay" => null,
                "street" => null,
                "zip_code" => null
            ],
            "emergency_contact" => [
                "name" => null,
                "relationship" => null,
                "contact_no" => null,
                "address" => [
                    "region" => null,
                    "province" => null,
                    "municipality" => null,
                    "barangay" => null,
                    "street" => null
                ]
            ]
        ];

        UserInformation::create([
            'accounts' => json_encode($accounts),
            'backgrounds' => json_encode($family),
            'contacts' => json_encode($contacts),
            'user_id' => $id
        ]);
        
    }
}
