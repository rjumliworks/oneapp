<?php

namespace App\Http\Resources\Employee\Request;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $hashids = new Hashids('krad',10);
        $key = $hashids->encode($this->id);

        return [
            'id' => $this->id,
            'key' => $key,
            'code' => $this->code,
            'type' => $this->type->name,
            'purpose' => $this->detail->purpose,
            'remarks' => $this->detail->remarks,
            'start' => $this->dates[0]->start,
            'end' => $this->dates[0]->end,
            'status' => $this->status,
            'employee' => $this->user->profile->firstname.' '.$this->user->profile->lastname,
            'tags' => TagResource::collection($this->tags),
            'comments' => CommentResource::collection($this->comments),
            'signatories' => $this->signatories,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // 'travel' => $this->travel,
            // 'reservation' => $this->reservation,
            // 'leave' => $this->leave,
            'information' => match ($this->type->name) {
                'Travel Order' => new TravelResource($this->travel),
                'Vehicle Reservation' => new VehicleResource($this->reservation),
                'Leave Form' => new LeaveResource($this->leave),
                default => null,
            },
        ];
    }
}
