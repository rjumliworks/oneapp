<?php

namespace App\Http\Resources\Vrams;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'purpose' => $this->purpose,
            'destination' => $this->destination,
            'start' => $this->start,
            'end' => $this->end,
            'time' => $this->time,
            'status' => $this->request->status,
            'employee' => $this->request->user->profile->firstname.' '.$this->request->user->profile->lastname,
            'remarks' => $this->remarks,
            'mode' => $this->mode,
            'expense' => $this->expense,
            'expenses' => $this->expense_items, 
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
