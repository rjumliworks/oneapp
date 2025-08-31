<?php

namespace App\Services\Employee\Approval;

use App\Models\Request;
use App\Models\Signatory;
use App\Http\Resources\Employee\Request\IndexResource;

class ViewClass
{
    public function lists($request){
        $division = Signatory::where('user_id',\Auth::user()->id)->where('is_active',1)->value('division_id');
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
        ->whereHas('signatories', function ($query) use ($division) {
            $query->where('division_id', $division);
        })
        ->latest() 
        ->paginate($request->count ?? 10);

        return IndexResource::collection($data);
    }

}
