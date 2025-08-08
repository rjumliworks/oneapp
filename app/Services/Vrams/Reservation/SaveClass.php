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
            foreach ($request->tags ?? [] as $user) {
                $data->tags()->create([
                    'user_id' => intval($user['value']),
                    'division_id' => intval($user['division_id']),
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

            $data->detail()->create($request->only([
                'purpose', 'remarks'
            ]));
            $data->location()->create($request->only([
                'address','longitude','latitude','barangay_code','municipality_code','province_code','region_code'
            ]));
            $data->reservation()->create([
                'vehicle_id' => $request->vehicle['value'],
                'driver_id' => $request->vehicle['driver_id']
            ]);
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
