<?php

namespace App\Http\Resources\Vrams;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->user->profile->firstname.' '.$this->user->profile->lastname,
            'avatar' => ($this->user->profile->avatar === 'avatar.jpg') ? '/images/avatars/'.$this->user->profile->avatar : '/storage/profile-pictures/'.$this->user->profile->avatar,
            'is_driver' => $this->is_driver
        ];
    }
}
