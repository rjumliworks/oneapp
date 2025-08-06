<?php

namespace App\Services\Vrams\Reservation;

use Hashids\Hashids;
use App\Models\Reservation;
use App\Http\Resources\Vrams\ReservationResource;

class ViewClass
{
    public function show($code){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($code);

        $data = Reservation::with([
            'vehicle',
            'approved.user.profile:user_id,firstname,middlename,lastname',
            'request.tags.user:id',
            'request.tags.user.profile:user_id,firstname,middlename,lastname,avatar',
            'request.statuses.user:id',
            'request.statuses.user.profile:user_id,firstname,middlename,lastname,avatar',
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

        return new ReservationResource($data);
    }

    public function reservation($request){
        $data = Reservation::with([
            'vehicle',
            'approved.user.profile:user_id,firstname,middlename,lastname',
            'request.tags.user:id',
            'request.tags.user.profile:user_id,firstname,middlename,lastname,avatar',
            'request.statuses.user:id',
            'request.statuses.user.profile:user_id,firstname,middlename,lastname,avatar',
            'request.statuses.status',
            'request.status',
            'request.type',
            'request.dates',
            'request.detail',
            'request.user:id',
            'request.user.profile:user_id,firstname,middlename,lastname',
            'request.location.region:code,name,region','request.location.province:code,name','request.location.municipality:code,name','request.location.barangay:code,name'
        ])
        ->when($request->keyword, function ($query, $keyword) {
            $query->whereHas('request.user.profile', function ($q) use ($keyword) {
                $q->whereRaw('LOWER(CONCAT(firstname, " ", lastname)) LIKE ?', ['%' . strtolower($keyword) . '%'])
                ->orWhereRaw('LOWER(CONCAT(lastname, " ", firstname)) LIKE ?', ['%' . strtolower($keyword) . '%']);
            });
        })
        ->when($request->status, function ($query, $status) {
            $query->whereHas('request', function ($query) use ($status) {
               $query->where('status_id',$status);
            });
        })
        ->latest() 
        ->paginate($request->count ?? 10);

        return ReservationResource::collection($data);
    }

    public function counts($statuses){
        foreach($statuses as $status){
            $counts[] = Reservation::
            whereHas('request',function ($query) use ($status){
                $query->where('status_id',$status['value']);
            })
            ->count();
        }
        return $counts;
    }
}
