<?php

namespace App\Services\Employee\Approval;

use App\Models\Request;
use App\Models\Signatory;
use App\Http\Resources\Employee\Request\IndexResource;

class ViewClass
{
    public function lists($request){
        $signatory = Signatory::where('user_id',\Auth::user()->id)->where('is_active',1)->first(); 
        $status = $request->status ?? (($signatory['designation_id'] == 44) ? 24 : 25);
        // add start end date to filter the request by signatories appointment
        $data = Request::with([
            'tags.user:id',
            'tags.user.profile:user_id,firstname,middlename,lastname,avatar',
            'status',
            'type',
            'dates',
            'detail',
            'travel:id,request_id,mode_id',
            'travel.mode:id,name',
            'leave:id,request_id,type_id',
            'leave.type:id,name',
            'reservation:id,request_id,vehicle_id',
            'reservation.vehicle:id,name'
        ])
        ->when($request->status, fn($q, $status) => $q->where('status_id', $status))
        ->when($request->type, fn($q, $expense) => $q->where('type_id', $expense))
        ->when($request->keyword, function ($query, $keyword) {
            $query->whereHas('user.profile', function ($q) use ($keyword) {
                $q->whereRaw('LOWER(CONCAT(firstname, " ", lastname)) LIKE ?', ['%' . strtolower($keyword) . '%'])
                ->orWhereRaw('LOWER(CONCAT(lastname, " ", firstname)) LIKE ?', ['%' . strtolower($keyword) . '%']);
            });
        })
        ->where('status_id',$status)
        ->whereHas('signatories', function ($query) use ($signatory) {
            if($signatory['designation_id'] == 44){
                $query->where('division_id', $signatory['division_id']);
                $query->where('is_approval_only',0);
            }
        })
        ->orderBy('created_at','ASC')
        ->paginate($request->count ?? 10);

        return IndexResource::collection($data);
    }

    public function count(){
        $signatory = Signatory::where('user_id',\Auth::user()->id)->where('is_active',1)->first(); 
        $status = ($signatory['designation_id'] == 44) ? 25 : 26;
        return $data = Request::where('status_id',$status)
        ->whereHas('signatories', function ($query) use ($signatory) {
            if($signatory['designation_id'] == 44){
                $query->where('division_id', $signatory['division_id']);
                $query->where('is_approval_only',0);
            }
        })
        ->count();
    }

}
