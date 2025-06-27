<?php

namespace App\Services\Hr\Payroll;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Dtr;
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
        $cycle = PayrollCycle::where('month',$request->month)->where('year',$request->year)->where('is_regular',$request->is_regular)->first();
        if($cycle){
            $data = PayrollCutoff::create(
                array_merge($request->all(), [
                    'code' => $this->generateCode2(),
                    'user_id' => \Auth::user()->id,
                    'cycle_id' => $cycle->id,
                    'status_id' => 1
                ])
            );
        }else{
            $data = PayrollCycle::create(array_merge($request->all(), [
                'code' => $this->generateCode(),
                'user_id' => \Auth::user()->id
            ]));
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
        $data = PayrollCutoff::with('cycle')->where('id',$request->id)->first();

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
                if($data->type == '1st'){
                    $total = 0;
                    $deductions = UserDeduction::where('is_active',1)->where('is_automatic',1)->where('user_id',$user)->get();
                    foreach($deductions as $deduction){
                        $pd = PayrollDeduction::create([
                            'amount' => $deduction->amount,
                            'deduction_id' => $deduction->deduction_id,
                            'payroll_id' => $payroll->id
                        ]);
                        $cleanAmount = floatval(str_replace(['₱', ','], '', $deduction->amount));
                        $total += $cleanAmount;
                    }

                    $salary = floatval(str_replace(['₱', ','], '', optional(UserOrganization::with('salary')->where('user_id', $user)->first())->salary?->amount));
                    $payroll->gross = $salary;
                    $payroll->deduction = $total;
                    $payroll->netpay = $salary - $total;
                    if(!$data->cycle->is_regular){
                        $tardiness = $this->tardiness($data,$user,$salary);
                        $payroll->mins = $tardiness['mins'];
                        $payroll->days = $tardiness['days'];
                        $payroll->tardiness = $tardiness['total'];
                        $payroll->netpay = ($salary/2) - ($tardiness['total'] + $total);
                    }
                    $payroll->save();
                }else if($data->type == '2nd'){
                    $total = 0;
                    $previous = Payroll::where('user_id',$user)
                    ->whereHas('cutoff', function ($query) use ($data) {
                        $query->where('cycle_id',$data->cycle_id);
                    })
                    ->where('user_id',$user)
                    ->first();

                    $salary = floatval(str_replace(['₱', ','], '', optional(UserOrganization::with('salary')->where('user_id', $user)->first())->salary?->amount));
                    $tardiness = $this->tardiness($data,$user,$salary);
                    $previous_net = (floatval(str_replace(['₱', ','], '',$previous->gross))/2) - floatval(str_replace(['₱', ','], '',$previous->tardiness));
                    $tax = ($previous_net + (($salary/2) - $tardiness['total'])) * 0.02;
                 

                    $payroll->gross = $salary;
                    $payroll->deduction = $tax;
                    $payroll->mins = $tardiness['mins'];
                    $payroll->days = $tardiness['days'];
                    $payroll->tardiness = $tardiness['total'];
                    $payroll->netpay = ($salary/2) - ($tardiness['total'] + $tax);
                    $payroll->save();

                    

                    $deduction = UserDeduction::where('is_active',1)->where('is_automatic',0)->where('user_id',$user)->first();
                    $pd = PayrollDeduction::create([
                        'amount' => $tax,
                        'deduction_id' => $deduction->deduction_id,
                        'payroll_id' => $payroll->id
                    ]);
                }
            }
        }
        
        return [
            'data' => $data,
            'message' => 'Cycle creation was successful!', 
            'info' => "You've successfully created a new cycle."
        ];
    }

    private function tardiness($data,$user,$salary){
        $start = Carbon::parse($data->start);
        $end = Carbon::parse($data->end);
        $holidays = ['2025-06-06', '2025-06-12'];
        $period = CarbonPeriod::create($start, $end);
        $filteredPeriod = collect($period)->reject(function ($date) use ($holidays) {
            return in_array($date->toDateString(), $holidays);
        });
        $lateMinutes = 0;
        $undertimeMinutes = 0;
        $absentDays = 0;

        

        $dtrs = Dtr::where('user_id',$user)
        ->whereBetween('date', [$start->toDateString(), $end->toDateString()])
        ->whereNotIn('date', $holidays)
        ->get()
        ->keyBy(fn ($dtr) => Carbon::parse($dtr->date)->toDateString());

        foreach ($filteredPeriod as $day) {
            if ($day->isWeekend()) {
                continue;
            }

            $dayString = $day->toDateString();
            $dtr = $dtrs[$dayString] ?? null;
            if($dtr){
                $hasAmLogs = !empty($dtr->am_in_at) && !empty($dtr->am_out_at);
                $hasPmLogs = !empty($dtr->pm_in_at) && !empty($dtr->pm_out_at);
            
                if (!$hasAmLogs) {
                    $absentDays += 0.5;
                }

                if (!$hasPmLogs) {
                    $absentDays += 0.5;
                }
                if ($hasAmLogs && $hasPmLogs) {
                    $amin = json_decode($dtr->am_in_at);
                    $amout = json_decode($dtr->am_out_at);
                    $pmin = json_decode($dtr->pm_in_at);
                    $pmout = json_decode($dtr->pm_out_at);

                    $lateMinutes += $amin->minutes + $pmin->minutes;
                    $undertimeMinutes += $amout->minutes + $pmout->minutes;
                }
            }else{
                $absentDays += 1;
            }
        }
        $dailyRate = $salary / 22;
        $perMinuteRate = $dailyRate / 480;

        $absenceDeduction = round($dailyRate * $absentDays, 2);
        $lateDeduction = round($perMinuteRate * $lateMinutes, 2);
        $undertimeDeduction = round($perMinuteRate * $undertimeMinutes, 2);
        $totalDeduction = $absenceDeduction + $lateDeduction + $undertimeDeduction;

        return [
            'days' => $absentDays,
            'mins' => $undertimeMinutes + $lateMinutes,
            'total' => $totalDeduction
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
