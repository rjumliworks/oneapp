<?php

namespace App\Http\Resources\Vrams;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $start =  date("M d, Y",strtotime($this->start));
        $end =  date("M d, Y",strtotime($this->end));
        $s_time = date("g:i a",strtotime($this->start));
        $e_time = date("g:i a",strtotime($this->end));

        $type = $this->request->type->name;
        $taggedNames = $this->request->tags->map(function ($user) {
            $firstInitial = strtoupper(substr($user->user->profile->firstname, 0, 1));
            $middleInitial = strtoupper(substr($user->user->profile->middlename, 0, 1));
            $lastName = $user->user->profile->lastname;

            return "{$firstInitial}{$middleInitial}{$lastName}";
        })->implode(', ');
        
        switch($type){
            case 'Travel Order':
                $title = $this->request->location->municipality->name.' - '.$taggedNames;
                $class = 'bg-success text-white';
            break;
            case 'Vehicle Reservation':
                $title = $this->request->reservations[0]->vehicle->name.' - '.$taggedNames;
                $class = 'bg-info text-white';
            break;
        }

        return [
            'id' => $this->id,
            'title' => $title,
            'className' => $class,
            'start' => \Carbon\Carbon::parse($this->start)->format('Y-m-d'),
            'end' => \Carbon\Carbon::parse($this->end)->format('Y-m-d'),
            'start_date' => date("M d, Y g:i a",strtotime($this->start)),
            'end_date' => date("M d, Y g:i a",strtotime($this->start)),
            's_date' => date("Y-m-d H:i",strtotime($this->start)),
            'e_date' => date("Y-m-d H:i",strtotime($this->end)),
            'ss_date' => date("M d, Y",strtotime($this->start)),
            'ee_date' => date("M d, Y",strtotime($this->end)),
        ];
    }
}
