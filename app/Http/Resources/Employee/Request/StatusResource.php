<?php

namespace App\Http\Resources\Employee\Request;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->user->profile->firstname.' '.$this->user->profile->middlename[0].'. '.$this->user->profile->lastname.($this->user->profile->suffix ? ', '.$this->user->profile->suffix : ''),
            'status' => $this->status->name,
            'icon' => $this->status->type,
            'color' => $this->status->others,
            'date' => $this->created_at
        ];
    }
}
