<?php

namespace App\Services\Hr\Payroll;

use Carbon\Carbon;
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

    public function print($request){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->code);
        $data = PayrollCutoff::with('cycle')
        ->with('payrolls.deductions.deduction.deduction')
        ->with('payrolls.user.profile:id,user_id,firstname,middlename,lastname,suffix')
        ->with('payrolls.user:id,username','payrolls.user.organization:id,user_id,position_id,salary_id','payrolls.user.organization.position:id,name','payrolls.user.organization.salary:id,grade,amount')
        ->where('id',$id)
        ->first();

        $deductionNames = [
            'Philhealth n/a',
            'Pag-ibig I n/a',
            'Pag-ibig II n/a',
            'HDMF Housing Loan n/a',
            'Multi-Purpose Loan Pag-ibig Loan',
            'Calamity Loan Pag-ibig Loan',
            'Current Month GSIS Life',
            'Prior Year GSIS Life',
            'Policy Loan n/a',
            'Multi-Purpose Loan n/a',
            'SIKAT MDABP n/a',
            'SSS Contribution n/a',
            'AMAPHIL n/a',
            'Withholding Tax n/a',
        ];

        $totalSalary = 0;
        $totalDeductions = array_fill_keys($deductionNames, 0);
        $totalNetAmount = 0;
        $totalDeductionAmount = 0;
        $totalFirstAmount = 0;

        $payrolls = $data->payrolls->sortBy(function ($payroll) {
            return optional($payroll->user->profile)->lastname . ' ' .optional($payroll->user->profile)->firstname. ' ' .optional($payroll->user->profile)->middlename[0];
        })
        ->values()
        ->map(function ($payroll) use (&$totalSalary, &$totalDeductions, &$totalNetAmount,&$totalDeductionAmount,&$totalFirstAmount, $deductionNames) {
            $salary = optional($payroll->user->organization->salary)->amount ?? 0;
            $totalSalary += floatval(str_replace(['₱', ','], '', $salary));
            $deductions = array_fill_keys($deductionNames, 0);

            foreach ($payroll->deductions as $d) {
                $name = optional($d->deduction->deduction)->name.' '.optional($d->deduction->deduction)->subtype;
                if (isset($deductions[$name])) {
                    $deductions[$name] += floatval(str_replace(['₱', ','], '', $d->amount));
                    $totalDeductions[$name] += floatval(str_replace(['₱', ','], '', $d->amount));
                }
            }

            $net = (float) str_replace(['₱', ','], '', $payroll->netpay);
            $firstHalf = round($net / 2, 2);
            $totalNetAmount += floatval(str_replace(['₱', ','], '', $net));
            $totalDeductionAmount += floatval(str_replace(['₱', ','], '', $payroll->deduction));
            $totalFirstAmount += floatval(str_replace(['₱', ','], '', $firstHalf));
            
            return [
                'id' => $payroll->id,
                'deduction' => $payroll->deduction,
                'netpay' => $payroll->netpay,
                'username' => $payroll->user->username ?? '',
                'name' => optional($payroll->user->profile)->lastname . ' ' .optional($payroll->user->profile)->firstname. ' ' .optional($payroll->user->profile)->middlename[0],
                'position' => optional($payroll->user->organization->position)->name,
                'salary' => optional($payroll->user->organization->salary)->amount,
                'grade' => optional($payroll->user->organization->salary)->grade,
                'deductions' => $deductions,
                'first' => $firstHalf
            ];
        });

        $start = Carbon::parse($data->start);
        $end = Carbon::parse($data->end);

        $cutoff = [
            'title' => 'PAYROLL FOR THE PERIOD OF ' . strtoupper($start->format('F')) . ' ' . $start->format('d') . '-' . $end->format('d') . ', ' . $end->format('Y'),
            'payrolls' => $payrolls,
            'totals' => [
                'salary' => $totalSalary,
                'deductions' => $totalDeductions,
                'net' => $totalNetAmount,
                'deduction' => $totalDeductionAmount,
                'first' => $totalFirstAmount
            ]
        ];

        return inertia('Modules/HumanResource/Payrolls/Components/Pages/View',[
            'cutoff' => $cutoff,
            'deductionHeaders' => $deductionNames,
        ]);
    }
}
