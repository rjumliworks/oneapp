<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'name' => $this->user->profile->firstname.' '.$this->user->profile->lastname,
            'avatar' => ($this->user->profile->avatar === 'avatar.jpg') ? '/images/avatars/'.$this->user->profile->avatar : '/storage/profile-pictures/'.$this->user->profile->avatar,
            'replies' => CommentResource::collection($this->replies),
            'created_at' => $this->created_at
        ];
    }
}
