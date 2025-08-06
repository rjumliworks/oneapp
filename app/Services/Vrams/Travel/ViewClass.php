<?php

namespace App\Services\Vrams\Travel;

use Hashids\Hashids;
use App\Models\Travel;
use App\Models\RequestDate;
use App\Http\Resources\Vrams\TravelResource;
use App\Http\Resources\Vrams\ScheduleResource;

class ViewClass
{   
    public function show($code){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($code);

        $data = Travel::with([
            'mode',
            'expense',
            'approved.user.profile:user_id,firstname,middlename,lastname',
            'recommended.user.profile:user_id,firstname,middlename,lastname',
            'request.tags.user:id',
            'request.tags.user.profile:user_id,firstname,middlename,lastname,avatar',
            'request.statuses.user:id',
            'request.statuses.user.profile:user_id,firstname,middlename,lastname',
            'request.statuses.status',
            'request.status',
            'request.type',
            'request.dates',
            'request.detail',
            'request.user:id',
            'request.user.profile:user_id,firstname,middlename,lastname',
            'request.location.region:code,name,region','request.location.province:code,name','request.location.municipality:code,name','request.location.barangay:code,name'
        ])
        ->where('id',$id)
        ->first();

        return new TravelResource($data);
    }

    public function travel($request){
        $data = Travel::with([
            'mode',
            'expense',
            'approved.user.profile:user_id,firstname,middlename,lastname',
            'recommended.user.profile:user_id,firstname,middlename,lastname',
            'request.tags.user:id',
            'request.tags.user.profile:user_id,firstname,middlename,lastname,avatar',
            'request.statuses.user:id',
            'request.statuses.user.profile:user_id,firstname,middlename,lastname',
            'request.statuses.status',
            'request.status',
            'request.type',
            'request.dates',
            'request.detail',
            'request.user:id',
            'request.user.profile:user_id,firstname,middlename,lastname',
            'request.location.region:code,name,region','request.location.province:code,name','request.location.municipality:code,name','request.location.barangay:code,name'
        ])
        ->when($request->mode, fn($q, $mode) => $q->where('mode_id', $mode))
        ->when($request->expense, fn($q, $expense) => $q->where('expense_id', $expense))
        ->when($request->keyword, function ($query, $keyword) {
            $query->whereHas('request.user.profile', function ($q) use ($keyword) {
                $q->whereRaw('LOWER(CONCAT(firstname, " ", lastname)) LIKE ?', ['%' . strtolower($keyword) . '%'])
                ->orWhereRaw('LOWER(CONCAT(lastname, " ", firstname)) LIKE ?', ['%' . strtolower($keyword) . '%']);
            })
            ->orWhereRaw('LOWER(destination) LIKE ?', ['%' . strtolower($keyword) . '%'])
            ->orWhereRaw('LOWER(purpose) LIKE ?', ['%' . strtolower($keyword) . '%']);
        })
        ->when($request->status, function ($query, $status) {
            $query->whereHas('request', function ($query) use ($status) {
               $query->where('status_id',$status);
            });
        })
        ->latest() 
        ->paginate($request->count ?? 10);

        return TravelResource::collection($data);
    }

    public function counts($statuses){
        foreach($statuses as $status){
            $counts[] = Travel::
            whereHas('request',function ($query) use ($status){
                $query->where('status_id',$status['value']);
            })
            ->count();
        }
        return $counts;
    }

    public function schedule(){
        $data = RequestDate::with([
            'request.tags.user:id',
            'request.tags.user.profile:user_id,firstname,middlename,lastname,avatar',
            'request.statuses.user:id',
            'request.statuses.user.profile:user_id,firstname,middlename,lastname',
            'request.statuses.status',
            'request.status',
            'request.type',
            'request.dates',
            'request.detail',
            'request.user:id',
            'request.user.profile:user_id,firstname,middlename,lastname',
            'request.location.region:code,name,region','request.location.province:code,name','request.location.municipality:code,name','request.location.barangay:code,name',
            'request.travels',
            'request.reservations.vehicle'    
        ])->get();

        return ScheduleResource::collection($data);
    }
}


