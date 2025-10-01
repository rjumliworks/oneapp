<?php

namespace App\Services\Employee\Approval;

use Hashids\Hashids;
use App\Models\Signatory;
use App\Models\Request;
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
            }
        }

        return [
            'data' => $data,
            'message' => 'Request Status Updated',
            'info' => "The status of this request has been successfully updated. Please check your notifications for the latest details and next steps."
        ];
    }
}
