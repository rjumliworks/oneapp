<?php

namespace App\Services\Vrams\Travel;

use App\Models\Travel;
use App\Http\Resources\Vrams\TravelResource;

class ViewClass
{
    public function travel($request){
        $data = Travel::with([
            'mode',
            'expense',
            'request.tags.user:id',
            'request.tags.user.profile:user_id,firstname,middlename,lastname',
            'request.statuses.user:id',
            'request.statuses.user.profile:user_id,firstname,middlename,lastname',
            'request.statuses.status',
            'request.status',
            'request.user:id',
            'request.user.profile:user_id,firstname,middlename,lastname',
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
}


