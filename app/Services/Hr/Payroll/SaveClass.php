<?php

namespace App\Services\Hr\Payroll;

use App\Models\User;
use App\Models\Payroll;
use App\Models\PayrollCycle;
use App\Models\PayrollCutoff;
use App\Models\PayrollDeduction;
use App\Models\UserDeduction;
use App\Models\UserOrganization;
use App\Http\Resources\Hr\CycleResource;

class SaveClass
{
    public function cycle($request){
        $data = PayrollCycle::create(array_merge($request->all(), [
            'code' => $this->generateCode(),
            'user_id' => \Auth::user()->id
        ]));
        if($data->is_regular){
            $data->cutoffs()->create(
                array_merge($request->all(), [
                    'code' => $this->generateCode2(),
                    'user_id' => \Auth::user()->id,
                    'status_id' => 1
                ])
            );
        }
        return [
            'data' => new CycleResource($data),
            'message' => 'Cycle creation was successful!', 
            'info' => "You've successfully created a new cycle."
        ];
    }

    public function deduction($request){
        $data = Payroll::where('id',$request->payroll_id)->first();
        $deduction = $data->deductions()->create($request->all());
        if($deduction){
            $data->deduction = floatval(str_replace(['₱', ','], '', $data->deduction)) + floatval(str_replace(['₱', ','], '', $request->amount));
            $data->netpay = floatval(str_replace(['₱', ','], '',$data->gross)) - floatval(str_replace(['₱', ','], '', $data->deduction));
            $data->save();
        }
        return [
            'data' => new CycleResource($data),
            'message' => 'Cycle creation was successful!', 
            'info' => "You've successfully created a new cycle."
        ];
    }

    public function users($request){
        $data = PayrollCutoff::where('id',$request->id)->first();
        switch($request->type){
            case 'All Regular Employees':
                $users = User::whereHas('organization', function ($query) {$query->where('type_id', 15)->where('status_id',2);})->pluck('id');
            break;
            case 'Custom Employees':
                $users = $request->users;
            break;
            case 'Except Employees':
                $users = User::whereNotIn('id',$request->users)->whereHas('organization', function ($query) {$query->where('type_id', 15)->where('status_id',2);})->pluck('id');
            break;
        }

        foreach($users as $user){
            $payroll = $data->payrolls()->create([
                'user_id' => $user,
                'cutoff_id' => $request->id
            ]);
            if($payroll){
                $total = 0;
                $deductions = UserDeduction::where('is_active',1)->where('user_id',$user)->get();
                foreach($deductions as $deduction){
                    $pd = PayrollDeduction::create([
                        'amount' => $deduction->amount,
                        'deduction_id' => $deduction->id,
                        'payroll_id' => $payroll->id
                    ]);
                    $cleanAmount = floatval(str_replace(['₱', ','], '', $deduction->amount));
                    $total += $cleanAmount;
                }
                $amount = floatval(str_replace(['₱', ','], '', optional(UserOrganization::with('salary')->where('user_id', $user)->first())->salary?->amount));
                $payroll->gross = $amount;
                $payroll->deduction = $total;
                $payroll->netpay = $amount - $total;
                $payroll->save();
            }
        }
        
        return [
            'data' => $data,
            'message' => 'Cycle creation was successful!', 
            'info' => "You've successfully created a new cycle."
        ];
    }

    private function generateCode(){
        $year = date('Y'); 
        $c = PayrollCycle::whereYear('created_at',$year)->where('code','!=',NULL)->count();
        $code = 'R9-'.date('m').date('Y').'-'.str_pad(($c+1), 4, '0', STR_PAD_LEFT); 
        return $code;
    }

    private function generateCode2(){
        $year = date('Y'); 
        $c = PayrollCutoff::whereYear('created_at',$year)->where('code','!=',NULL)->count();
        $code = 'R9CFF-'.date('m').date('Y').'-'.str_pad(($c+1), 4, '0', STR_PAD_LEFT); 
        return $code;
    }
}
