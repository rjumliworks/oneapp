<?php

namespace App\Http\Resources\Vrams;

use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $hashids = new Hashids('krad',10);
        $key = $hashids->encode($this->id);

        return [
            'id' => $this->id,
            'key' => $key,
            'code' => $this->request->code,
            'purpose' => $this->purpose,
            'destination' => $this->destination,
            'start' => $this->start,
            'end' => $this->end,
            'time' => $this->time,
            'status' => $this->request->status,
            'employee' => $this->request->user->profile->firstname.' '.$this->request->user->profile->lastname,
            'remarks' => $this->remarks,
            'mode' => $this->mode,
            'tags' => TagResource::collection($this->request->tags),
            'expense' => $this->expense,
            'recommended' => $this->recommended,
            'approved' => $this->approved,
            'expenses' => $this->expense_items, 
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
