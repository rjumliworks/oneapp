<?php

namespace App\Services\Hr\Leave;

use App\Models\Request;

class SaveClass
{
    public function leave($request){
        $data = Request::create([
            'code' => $this->generateCode(),
            'type_id' => 158,
            'status_id' => 24,
            'user_id' => \Auth::user()->id
        ]);
        if($data){
            $data->tags()->create([
                'user_id' => \Auth::user()->id,
                'division_id' => \Auth::user()->organization->division_id,
            ]);
            if($request->date_type != 'Multiple Dates (non-continuous)'){
                $dates = $request->dates;
                $allWholeDay = array_reduce($dates, function ($carry, $item) {
                    return $carry && ($item['timeOfDay'] === 'Whole Day');
                }, true);

                if ($allWholeDay) {
                    $dates = array_column($dates, 'date');
                    $start = min($dates);
                    $end = max($dates);

                    $data->dates()->create([
                        'start' => $start,
                        'end' => $end,
                        'time' => '08:00',
                    ]);
                } else {
                    foreach($dates as $date){
                        $data->dates()->create([
                            'start' => $date['date'],
                            'end' => $date['date'],
                            'time' => '08:00',
                            'time_of_day' => $date['timeOfDay']
                        ]);
                    }
                    
                }
            }else{
                $dates = $request->dates;
                foreach($dates as $date){
                    $data->dates()->create([
                        'start' => $date['date'],
                        'end' => $date['date'],
                        'time' => '08:00',
                        'time_of_day' => $date['timeOfDay']
                    ]);
                }
            }
        }

        return [
            'data' => $data,
            'message' => 'Leave Request Submitted', 
            'info' => "Your leave request has been submitted. Keep an eye on your notifications for any approvals or updates."
        ];
    }

    private function generateCode()
    {
        return \DB::transaction(function () {
            $latest = Request::lockForUpdate()
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->orderByDesc('id')
                ->first();

            $count = $latest
                ? (int) substr($latest->code, -4) + 1
                : 1;

            $code = 'REQUEST-' . now()->format('mY') . '-LEAVE-' . str_pad($count, 4, '0', STR_PAD_LEFT);

            return $code;
        });
    }
}
