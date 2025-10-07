<?php

namespace App\Http\Resources\Assets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->user->profile->firstname.' '.$this->user->profile->lastname,
            'date' => date('F d, Y', strtotime($this->date))
        ];
    }
}
