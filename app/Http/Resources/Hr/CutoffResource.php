<?php

namespace App\Http\Resources\Hr;

use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CutoffResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $hashids = new Hashids('krad',10);
        $code = $hashids->encode($this->id);

        return [
            'id' => $this->id,
            'code' => $code,
            'start' => $this->start,
            'end' => $this->end,
            'type' => $this->type,
            'is_locked' => $this->is_locked,
            'cycle' => $this->cycle,
            'payrolls' => PayrollResource::collection($this->payrolls),
            'created_at' => $this->created_at
        ];
    }
}
