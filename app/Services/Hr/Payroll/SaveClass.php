<?php

namespace App\Services\Hr\Payroll;

use App\Models\PayrollCycle;
use App\Models\PayrollCutoff;
use App\Http\Resources\Hr\CycleResource;

class SaveClass
{
    public function cycle($request){
        $data = PayrollCycle::create(array_merge($request->all(), ['code' => $this->generateCode(),'user_id' => \Auth::user()->id]));
        if($data->is_regular){
            $data->cutoffs()->create($request->all());
        }
        return [
            'data' => new CycleResource($data),
            'message' => 'Cycle creation was successful!', 
            'info' => "You've successfully created a new cycle."
        ];
    }

    // private function makeCutoff($request){
    //     $data = PayrollCut::create(array_merge($request->all(), ['code' => $this->generateCode(),'user_id' => \Auth::user()->id]));
    // }

    private function generateCode(){
        $year = date('Y'); 
        $c = PayrollCycle::whereYear('created_at',$year)->where('code','!=',NULL)->count();
        $code = 'R9-'.date('m').date('Y').'-'.str_pad(($c+1), 4, '0', STR_PAD_LEFT); 
        return $code;
    }
}
