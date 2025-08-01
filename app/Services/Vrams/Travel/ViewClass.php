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
        ->latest() 
        ->paginate($request->count ?? 10);

        return TravelResource::collection($data);
    }
}

//  ->when($request->date, function ($query, $date) {
//                 $query ->where('date',$date);
//             })
//   ->when($request->keyword, function ($query, $keyword) {
//                 $query->whereHas('user',function ($query) use ($keyword) {
//                     $query->whereHas('profile',function ($query) use ($keyword) {
//                         $query->when($keyword, function ($query, $keyword) {
//                             $query->whereRaw('concat(firstname, " ", lastname) LIKE ?', ['%' . $keyword . '%'])
//                             ->orWhereRaw('concat(lastname, " ", firstname) LIKE ?', ['%' . $keyword . '%']);
//                         });
//                     });
//                 });
//             })
