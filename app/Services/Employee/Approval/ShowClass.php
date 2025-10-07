<?php

namespace App\Services\Employee\Approval;

use Hashids\Hashids;
use App\Models\Leave;
use App\Models\Travel;
use App\Models\Request;
use App\Http\Resources\Employee\Request\LeaveResource;
use App\Http\Resources\Employee\Request\TravelResource;
use App\Http\Resources\Employee\Request\OvertimeResource;

class ShowClass
{
    public function travel($code){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($code);

        $data = Travel::with([
            'mode',
            'expense',
            'request.comments.user.profile:user_id,firstname,middlename,lastname,avatar','request.comments.replies.user.profile:user_id,firstname,middlename,lastname,avatar',
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
            'request.signatories.division','request.signatories.approved','request.signatories.recommended',
            'request.location.region:code,name,region','request.location.province:code,name','request.location.municipality:code,name','request.location.barangay:code,name'
        ])
        ->where('request_id',$id)
        ->first();

        return new TravelResource($data);
    }

    public function leave($code){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($code);

        $data = Leave::with([
            'detail',
            'type',
            'credits.log','credits.credit.leave',
            'request.comments.user.profile:user_id,firstname,middlename,lastname,avatar','request.comments.replies.user.profile:user_id,firstname,middlename,lastname,avatar',
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
            'request.signatories.division','request.signatories.approved','request.signatories.recommended'
        ])
        ->where('request_id',$id)
        ->first();

        return new LeaveResource($data);
    }

    public function overtime($code){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($code);

        $data = Request::with([
            'tags.user:id',
            'tags.user.profile:user_id,firstname,middlename,lastname,suffix,avatar',
            'statuses.user:id',
            'statuses.user.profile:user_id,firstname,middlename,lastname,suffix,avatar',
            'statuses.status',
            'status',
            'type',
            'dates',
            'detail',
            'user:id',
            'comments.user.profile:user_id,firstname,middlename,lastname,suffix,avatar','comments.replies.user.profile:user_id,firstname,middlename,lastname,suffix,avatar',
            'user.profile:user_id,firstname,middlename,lastname,suffix',
            'signatories.division','signatories.approved.profile','signatories.recommended.profile'
        ])
        ->where('id',$id)
        ->first();

        return new OvertimeResource($data);
    }
}
