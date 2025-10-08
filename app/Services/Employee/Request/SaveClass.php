<?php

namespace App\Services\Employee\Request;

use Hashids\Hashids;
use App\Models\Request;
use App\Models\Overtime;
use App\Models\Signatory;
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
            }
        }

        return [
            'data' => $data,
            'message' => 'Request Status Updated',
            'info' => "The status of this request has been successfully updated. Please check your notifications for the latest details and next steps."
        ];
    }

    public function overtime($request){
        $data = Overtime::find($request->id);
        $data->targets = $request->targets;
        $data->save();

        return [
            'data' => $data,
            'message' => 'Overtime targets updated',
            'info' => "The targets has been successfully updated."
        ];
    }
}
