<?php

namespace App\Services\Hr\Credit;

use App\Models\User;
use App\Http\Resources\Hr\CreditResource;

class ViewClass
{
    public function lists($request){
        $data = CreditResource::collection(
            User::select('users.id')
            ->with('profile')
            ->with('organization.position','organization.status')
            ->with('credits.leave','credits.logs.type')
            ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->when($request->keyword, function ($query, $keyword) {
                $query->whereHas('profile',function ($query) use ($keyword) {
                    $query->when($keyword, function ($query, $keyword) {
                        $query->whereRaw('concat(firstname, " ", lastname) LIKE ?', ['%' . $keyword . '%'])
                            ->orWhereRaw('concat(lastname, " ", firstname) LIKE ?', ['%' . $keyword . '%']);
                    });
                })
                ->orWhere('username', 'like', "%{$keyword}%");
            })
            ->whereHas('organization', function ($query) {
                $query->where('type_id', 15)->where('status_id',2);
            })
            ->whereHas('credits', function ($query) {
                $query->where('year', date('Y'));
            })
            ->orderBy('user_profiles.lastname', 'ASC')
            ->paginate($request->count)
        );
        return $data;
    }
}
