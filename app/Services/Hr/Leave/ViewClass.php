<?php

namespace App\Services\Hr\Leave;

use App\Models\ListLeave;
use App\Models\UserCredit;

class ViewClass
{
    public function credits()
    {
        $year = now()->year;
        $user_id = \Auth::user()->id;
        $is_regular = (\Auth::user()->organization->type_id == 15) ? true : false;
        $options = [];

        if($is_regular){
            $leaves = ListLeave::where('is_regular',1)->where('is_active',1)->where('is_requested',0)->get();
            foreach($leaves as $leave){
                $item = UserCredit::with('leave')->where('leave_id',$leave->id)->where('user_id',$user_id)->where('is_active',1)->where('year',$year)->first();
                $options[] = [
                    'label' => 'Require Credits',
                    'options' => [
                        'value' => $item->id,
                        'name' => $item->leave->name,
                        'citation' => $item->leave->citation,
                        'is_regular' => $item->leave->is_regular,
                        'is_after' => $item->leave->is_after,
                        'balance' => $item->balance,
                    ]
                ];
            }
        }else{
           
            $options = collect(); // Start as a collection

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
                    'name' => $item->leave->name,
                    'citation' => $item->leave->citation,
                    'is_regular' => $item->leave->is_regular,
                    'is_after' => $item->leave->is_after,
                    'balance' => $item->balance,
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
                    'name' => $item->name,
                    'citation' => $item->citation,
                    'is_regular' => $item->is_regular,
                    'is_after' => $item->is_after
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
