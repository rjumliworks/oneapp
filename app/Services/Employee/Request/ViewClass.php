<?php

namespace App\Services\Employee\Request;

use App\Models\Request;
use App\Models\ListLeave;
use App\Models\UserCredit;
use App\Http\Resources\Employee\RequestResource;

class ViewClass
{
    public function counts($types){
        $user_id = \Auth::user()->id;
        foreach($types as $type){
            $counts[] = Request::whereHas('tags', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })
            ->where('type_id',$type['value'])->count();
        }
        return $counts;
    }

    public function lists($request){
        $user_id = \Auth::user()->id;
        $data = Request::with([
            'tags.user:id',
            'tags.user.profile:user_id,firstname,middlename,lastname,avatar',
            'status',
            'type',
            'dates',
            'detail',
            'user:id',
            'user.profile:user_id,firstname,middlename,lastname'
        ])
        ->when($request->status, fn($q, $status) => $q->where('status_id', $status))
        ->when($request->type, fn($q, $expense) => $q->where('type_id', $expense))
        ->when($request->keyword, function ($query, $keyword) {
            $query->whereHas('user.profile', function ($q) use ($keyword) {
                $q->whereRaw('LOWER(CONCAT(firstname, " ", lastname)) LIKE ?', ['%' . strtolower($keyword) . '%'])
                ->orWhereRaw('LOWER(CONCAT(lastname, " ", firstname)) LIKE ?', ['%' . strtolower($keyword) . '%']);
            });
        })
        ->whereHas('tags', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })
        ->latest() 
        ->paginate($request->count ?? 10);

        return RequestResource::collection($data);
    }

    public function credits()
    {
        $year = now()->year;
        $user_id = \Auth::user()->id;
        $is_regular = \Auth::user()->organization->type_id == 15;
        $sex = \Auth::user()->profile->sex;
        $options = [];

        if($is_regular){
            $options = collect();
            $leaves = ListLeave::where('is_regular',1)->where('is_active',1)->where('is_requested',0)->get();
            foreach($leaves as $leave){
                $item = UserCredit::with('leave')->where('leave_id',$leave->id)->where('user_id',$user_id)->where('is_active',1)->where('year',$year)->first();
                if($item){
                    $options[] = [
                        'label' => 'Require Credits',
                        'options' => [
                            'value' => $item->id,
                            'label' => $item->leave->name.' - '.$item->balance,
                            'name' => $item->leave->name,
                            'citation' => $item->leave->citation,
                            'is_regular' => $item->leave->is_regular,
                            'is_after' => $item->leave->is_after,
                            'type' => $item->leave->type,
                            'others' => $item->leave->others,
                            'balance' => $item->balance,
                            'disabled'   => ($item->balance == 0 || $item->balance == 0.00),
                            'required_document' =>  $item->leave->requires_document
                        ]
                    ];
                }
            }
            $leaves = ListLeave::where(function ($query) use ($sex){
                $query->whereNull('sex')
                    ->orWhere('sex',$sex);
            })->where('is_regular',1)->where('is_active',1)->where('is_requested',1)->get();
            foreach($leaves as $item){
                $options->push([
                    'label' => 'Require Documents',
                    'options' => [
                        'value' => $item->id,
                        'label' => $item->name,
                        'name' => $item->name,
                        'citation' => $item->citation,
                        'is_regular' => $item->is_regular,
                        'is_after' => $item->is_after,
                        'type' => $item->type,
                        'others' => $item->others,
                        'required_document' =>  $item->requires_document
                    ]
                ]);
            }
        }else{
            $options = collect();
            $item = UserCredit::with('leave')
            ->where('leave_id', 14)
            ->where('user_id', $user_id)
            ->where('is_active', 1)
            ->where('year', $year)
            ->first();

            if ($item) {
                $options->push([
                    'label' => 'Require Credits',
                    'options' => [
                        'value' => $item->id,
                        'label' => $item->leave->name.' - '.$item->balance,
                        'name' => $item->leave->name,
                        'citation' => $item->leave->citation,
                        'is_regular' => $item->leave->is_regular,
                        'is_after' => $item->leave->is_after,
                        'type' => $item->leave->type,
                        'others' => $item->leave->others,
                        'balance' => $item->balance,
                        'disabled'   => ($item->balance == 0 || $item->balance == 0.00),
                        'required_document' => false
                    ]
                ]);
            }

            $item = ListLeave::where('id', 16)
            ->where('is_active', 1)
            ->first();

            if ($item) {
                $options->push([
                    'label' => 'Others',
                    'options' => [
                        'value' => $item->id,
                        'label' => $item->name,
                        'name' => $item->name,
                        'citation' => $item->citation,
                        'is_regular' => $item->is_regular,
                        'is_after' => $item->is_after,
                        'type' => $item->type,
                        'others' => $item->others,
                        'required_document' => false
                    ]
                ]);
            }
        }

        $grouped = $options->groupBy('label')->map(function ($items) {
            return [
                'label' => $items->first()['label'],
                'options' => $items->pluck('options')->values()
            ];
        })->values();

        return $grouped;
    }
}
