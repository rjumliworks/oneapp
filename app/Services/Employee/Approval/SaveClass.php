<?php

namespace App\Services\Employee\Approval;

use Hashids\Hashids;
use App\Models\Signatory;
use App\Models\Request;
use App\Models\Leave;
use App\Models\Overtime;
use App\Models\CreditLog;
use App\Models\UserCredit;
use App\Models\RequestSignatory;

class SaveClass
{
    public function status($request){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->id);

        $data = Request::find($id[0]);
        $data->status_id = $request->status_id;
        if($data->save()){
            if($request->status_id == 25){
                $division = Signatory::where('user_id',\Auth::user()->id)->where('is_active',1)->value('division_id'); 
                $signatory = RequestSignatory::where('division_id',$division)->where('request_id',$data->id)->where('is_approval_only',0)->first();
                $signatory->recommended_id = \Auth::user()->id;
                $signatory->recommended_date = now();
                $signatory->save();
            }else if($request->status_id == 26){
                $signatory = RequestSignatory::where('request_id',$data->id)->update([
                    'approved_id' => \Auth::user()->id,
                    'approved_date' => now(),
                    'is_completed' => 1
                ]);
                if($signatory){
                    if($data->type_id == 165){
                        $this->overtime($data->id);
                    }
                }
            }else if($request->status_id == 30){
                $signatory = RequestSignatory::where('request_id',$data->id)->update([
                    'is_disapproved' => 1
                ]);
                if($signatory){
                    if($data->type_id == 158){
                        $this->leave($data->id);
                    }
                }
            }
            $data->statuses()->create([
                'user_id' => \Auth::user()->id,
                'status_id' => $request->status_id
            ]);
        }

        return [
            'data' => $data,
            'message' => 'Request Status Updated',
            'info' => "The status of this request has been successfully updated. Please check your notifications for the latest details and next steps."
        ];
    }

    public function overtime($id){
        $data = new Overtime;
        $data->code = $this->generateCode();
        $data->request_id = $id;
        $data->status_id = 35;
        $data->save();
    }

    public function leave($id){
        $data = Leave::with('credits.log')->where('request_id',$id)->first();
        $credits = $data->credits;
        foreach($credits as $credit){
            $log = CreditLog::where('id',$credit->log_id)->first();
            $user = UserCredit::where('id',$log->credit_id)->first();
            $old_balance = $user->balance;
            $user->balance += $log->amount;
            $user->used -= $log->amount;
            if($user->save()){
                $log = $user->logs()->create([
                    'amount' => $log->amount,
                    'old_balance' => $old_balance,
                    'new_balance' => $user->balance,
                    'remarks' => 'Return of leave credits for cancelled/disapproved leave.',
                    'is_automated' => 1,
                    'user_id' => 1,
                    'type_id' => 164
                ]);

                if($log){
                    $data->credits()->create([
                        'is_borrowed' => $credit->is_borrowed,
                        'is_returned' => 1,
                        'log_id' => $log->id,
                        'credit_id' => $credit->credit_id
                    ]);
                }
            }

        }
    }

    private function generateCode()
    {
        return \DB::transaction(function () {
            $latest = Overtime::lockForUpdate()
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->orderByDesc('id')
                ->first();

            $count = $latest
                ? (int) substr($latest->code, -4) + 1
                : 1;

            $code = now()->format('Y') . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
            return $code;
        });
    }
}
