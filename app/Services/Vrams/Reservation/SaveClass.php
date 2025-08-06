<?php

namespace App\Services\Vrams\Reservation;

use App\Models\Request;

class SaveClass
{
    public function reservation($request){
        $data = Request::create([
            'code' => $this->generateCode(),
            'type_id' => 157,
            'status_id' => 24,
            'user_id' => \Auth::user()->id
        ]);
        if($data){
            foreach ($request->tags ?? [] as $userId) {
                $data->tags()->create([
                    'user_id' => intval($userId),
                ]);
            }
            if(strpos($request->date, ' to ') !== false) {
                [$start, $end] = explode(' to ', $request->date);
            } else {
                $start = $end = $request->date;
            }
            $start = \Carbon\Carbon::parse($start)->toDateString();
            $end = \Carbon\Carbon::parse($end)->toDateString();
            $data->dates()->create([
                'start' => $start,
                'end' => $end,
                'time' => $request->time,
            ]);
            $data->detail()->create($request->all());
            $data->location()->create($request->all());
            $data->reservations()->create(['vehicle_id' => $request->vehicle_id]);
        }

        return [
            'data' => $data,
            'message' => 'Vehicle Reservation Request Submitted', 
            'info' => "Your vehicle reservation has been submitted. Keep an eye on your notifications for any approvals or updates."
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

            $code = 'REQUEST-' . now()->format('mY') . '-VEHICLE-' . str_pad($count, 4, '0', STR_PAD_LEFT);

            return $code;
        });
    }
}
