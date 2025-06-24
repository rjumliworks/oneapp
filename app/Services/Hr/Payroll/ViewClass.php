<?php

namespace App\Services\Hr\Payroll;

use Hashids\Hashids;
use App\Models\User;
use App\Models\PayrollCutoff;
use App\Http\Resources\Hr\PayrollResource;
use App\Http\Resources\Hr\CutoffResource;

class ViewClass
{
    public function lists($request){
        $data = CutoffResource::collection(
            PayrollCutoff::with('cycle')
            ->with('payrolls.deductions.deduction.deduction')
            ->with('payrolls.user.profile:id,user_id,firstname,middlename,lastname,suffix')
            ->with('payrolls.user:id,username','payrolls.user.organization:id,user_id,position_id,salary_id','payrolls.user.organization.position:id,name','payrolls.user.organization.salary:id,grade,amount')
            ->orderBy('created_at', 'DESC')
            ->paginate($request->count)
        );
        return $data;
    }

    public function payroll($request){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->id);
        
        $data = PayrollResource::collection(
            User::select('id','username')
            ->with([
                'profile:id,user_id,firstname,middlename,lastname,suffix',
                'organization:id,user_id,position_id,salary_id',
                'organization.position:id,name',
                'organization.salary:id,grade,amount',
                'deductions' => function ($query) {
                    $query->where('is_active', 1);
                }
            ])
            ->withSum(['deductions as total_deductions' => function ($query) {
                $query->where('is_active', 1);
            }], 'amount')
            ->whereHas('organization', function ($query) {
                $query->where('status_id', 2);
            })
            ->whereHas('deductions', function ($query) {
                $query->where('is_active', 1);
            })
            ->get()
        );
        return $data;
    }

    public function view($code){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($code);

        $data = new CutoffResource(
            PayrollCutoff::query()
            ->with('cycle')
            ->with('payrolls')
            ->where('id',$id)->first()
        );
        return $data;
    }
}
