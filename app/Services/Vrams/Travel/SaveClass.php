<?php

namespace App\Services\Vrams\Travel;

use App\Models\Request;

class SaveClass
{
    public function travel($request){
        $data = Request::create([
            'code' => $this->generateCode(),
            'type_id' => 156,
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

            $travelData = [
                'mode_id' => $request->mode_id,
                'transpo_id' => $request->transpo_id,
                'expense_id' => $request->expense_id,
                'expenses' => array_map('intval', $request->expenses)
            ];
            $travel = $data->travels()->create($travelData);
            if($request->mode_id == 150){
                $data->reservations()->create(['vehicle_id' => $request->vehicle_id]);
            }
        }

        return [
            'data' => $data,
            'message' => 'Travel Request Submitted', 
            'info' => "Your travel schedule has been submitted. Keep an eye on your notifications for any approvals or updates."
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

            $code = 'REQUEST-' . now()->format('mY') . '-TRAVEL-' . str_pad($count, 4, '0', STR_PAD_LEFT);

            return $code;
        });
    }
}
