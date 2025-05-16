<?php

namespace App\Http\Resources\Hr;

use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $hashids = new Hashids('krad',10);
        $code = $hashids->encode($this->id);

        return [
            'id' => $this->id,
            'code' => $code,
            'email' => $this->email,
            'username' => $this->username,
            'profile' => $this->profile,
            'organization' => $this->organization,
            'information' => $this->information,
            'academics' => $this->academics,
            'credentials' => $this->credentials,
            'created_at' => $this->created_at,
            'avatar' => ($this->profile->avatar === 'avatar.jpg') ? '/images/avatars/'.$this->profile->avatar : '/storage/'.$this->profile->avatar,
 
        ];
    }
}
