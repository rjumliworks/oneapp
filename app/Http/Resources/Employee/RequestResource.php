<?php

namespace App\Http\Resources\Employee;

use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
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
            'updated_at' => $this->updated_at
        ];
    }
}
