<?php

namespace App\Services\Hr\Payroll;

use App\Models\User;
use App\Models\Request;
use App\Models\Schedule;
use App\Http\Resources\Hr\TimeResource;
use App\Http\Resources\Hr\DtrPayrollResource;

class SearchClass
{
    public function user($request){
        $keyword = $request->keyword;
        $is_regular = $request->is_regular;
        $cutoff_id = $request->cutoff_id;
        $start = \Carbon\Carbon::parse($request->start)->startOfDay();
        $end = \Carbon\Carbon::parse($request->end)->endOfDay();
        
        $data =  User::with([
            'profile',
            'organization.position',
            'organization.division',
            'organization.type',
            'payrolls' => function ($q) use ($cutoff_id) {
                $q->where('cutoff_id', $cutoff_id);
            },
            'dtrs' => function ($q) use ($start, $end) {
                $q->whereBetween('date', [$start, $end]);
            }
        ])
        ->when(!is_null($is_regular) && $is_regular == 1, function ($query) {
            $query->whereHas('organization', function ($query) {
                $query->where('type_id', 15);
            });
        })
        ->when($keyword, function ($query) use ($keyword){
            $query->whereHas('profile', function ($q) use ($keyword) {
                $q->where('firstname', 'like', '%' . $keyword . '%')
                ->orWhere('lastname', 'like', '%' . $keyword . '%')
                ->orWhereRaw('concat(firstname, " ", lastname) LIKE ?', ['%' . $keyword . '%'])
                ->orWhereRaw('concat(lastname, " ", firstname) LIKE ?', ['%' . $keyword . '%']);
            });
        })
        ->limit(5)->get()->map(function ($item) use ($start, $end){
            $alreadyInPayroll = $item->payrolls->isNotEmpty();
            $user_id = $item->id;
            $dates = [];
            $period = \Carbon\CarbonPeriod::create($start, $end);

            // Get holidays with both date and title
            $holidays = Schedule::whereBetween('start', [$start, $end])
                ->orWhereBetween('end', [$start, $end])
                ->orWhere(function ($q2) use ($start, $end) {
                    $q2->where('start', '<', $start)
                        ->where('end', '>', $end);
                })
                ->where('event_id', 31)
                ->get(['start', 'title'])
                ->flatMap(function ($holiday) {
                    $dates = [];
                    $startDate = \Carbon\Carbon::parse($holiday->start);
                    $endDate = \Carbon\Carbon::parse($holiday->end ?? $holiday->start);
                    foreach (\Carbon\CarbonPeriod::create($startDate, $endDate) as $day) {
                        $dates[$day->format('Y-m-d')] = $holiday->title;
                    }
                    return $dates;
                });

            // Get official business dates
            $travels = Request::where('type_id', 156)
                ->whereHas('tags', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id);
                })
                ->whereHas('dates', function ($q) use ($start, $end) {
                    $q->whereBetween('start', [$start, $end])
                        ->orWhereBetween('end', [$start, $end])
                        ->orWhere(function ($q2) use ($start, $end) {
                            $q2->where('start', '<', $start)
                                ->where('end', '>', $end);
                        });
                })
                ->with('dates', 'detail')
                ->get();

            $officialBusiness = [];
            foreach ($travels as $travel) {
                foreach ($travel->dates as $travelDate) {
                    $startDate = \Carbon\Carbon::parse($travelDate->start);
                    $endDate = \Carbon\Carbon::parse($travelDate->end ?? $travelDate->start);
                    foreach (\Carbon\CarbonPeriod::create($startDate, $endDate) as $day) {
                        $officialBusiness[$day->format('Y-m-d')] = $travel->location->address.', '.$travel->location->municipality->name ?? 'Official Business';
                    }
                }
            }

            // Generate daily data
            $dates = [];
            foreach ($period as $date) {
                $dateStr = $date->toDateString();
                // if ($date->isSaturday() || $date->isSunday()) {
                //     continue;
                // }

                $status = null;
                $title = null;

                if ($date->isSaturday() || $date->isSunday()) {
                    $status = 'Non-working Day';
                    $title = 'Non-working Day';
                }elseif (isset($holidays[$dateStr])) {
                    $status = 'Holiday';
                    $title = $holidays[$dateStr];
                } elseif (isset($officialBusiness[$dateStr])) {
                    $status = 'Official Travel';
                    $title = $officialBusiness[$dateStr];
                }

                $dtr = $item->dtrs->firstWhere('date', $dateStr);

                $dates[] = [
                    'date' => $dateStr,
                    'am_in' => ($dtr && $dtr->am_in_at) ? new TimeResource(json_decode($dtr->am_in_at)) : null,
                    'am_out' => ($dtr && $dtr->am_out_at) ? new TimeResource(json_decode($dtr->am_out_at)) : null,
                    'pm_in'  => ($dtr && $dtr->pm_in_at)  ? new TimeResource(json_decode($dtr->pm_in_at))  : null,
                    'pm_out' => ($dtr && $dtr->pm_out_at) ? new TimeResource(json_decode($dtr->pm_out_at)) : null,
                    'is_completed' => ($dtr ? $dtr->is_completed : null),
                    'status' => $status ?? ($dtr ? 'Present' : 'Absent'),
                    'title' => $title
                ];
            }


            return [
                'value' => $item->id,
                'name' => $item->profile->lastname . ', ' . $item->profile->firstname . ' ' . $item->profile->middlename . '.',
                'position' => optional($item->organization->position)->name,
                'division' => optional($item->organization->division)->name,
                'division_id' => optional($item->organization->division)->id,
                'type' => $item->organization->type->name,
                'avatar' => ($item->profile->avatar != 'avatar.jpg') 
                            ? '/storage/profile-pictures/' . $item->profile->avatar 
                            : '/images/avatars/avatar.jpg',
                'already_in_payroll' => $alreadyInPayroll,
                'dtrs' => $alreadyInPayroll ? [] : $dates
            ];
        });
        return $data;
    }
}
