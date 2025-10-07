<?php

namespace App\Services\Hr\Cto;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Resources\Hr\CtoResource;

class ViewClass
{
    public function lists($request)
    {
        $data = CtoResource::collection(
            User::select('users.id')
                ->with([
                    'profile',
                    'organization.position',
                    'organization.status',
                    'credits' => function ($q) {
                        $q->where('year', Carbon::now()->year)->where('is_active',1);
                    },
                    'credits.leave',
                    'credits.logs.type',
                ])
                ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->when($request->keyword, function ($query, $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->whereHas('profile', function ($q2) use ($keyword) {
                            $q2->whereRaw('concat(firstname, " ", lastname) LIKE ?', ["%{$keyword}%"])
                                ->orWhereRaw('concat(lastname, " ", firstname) LIKE ?', ["%{$keyword}%"]);
                        })
                        ->orWhere('username', 'like', "%{$keyword}%");
                    });
                })
                ->whereHas('organization', function ($query) {
                    $query->whereIn('type_id', [16,17])
                        ->where('status_id', 2);
                })
                ->orderBy('user_profiles.lastname', 'ASC')
                ->paginate($request->count)
        );

        return $data;
    }
}
