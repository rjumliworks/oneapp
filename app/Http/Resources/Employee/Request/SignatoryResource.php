<?php

namespace App\Http\Resources\Employee\Request;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SignatoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'recommended' => $this->recommended
                ? ($this->recommended->profile->firstname . ' ' .
                ($this->recommended->profile->middlename ? $this->recommended->profile->middlename[0] . '. ' : '') .
                $this->recommended->profile->lastname .
                ($this->recommended->profile->suffix ? ', ' . $this->recommended->profile->suffix : ''))
                : null,
            'recommended_date' => $this->recommended_date,
            'approved' => $this->approved
                ? ($this->approved->profile->firstname . ' ' .
                ($this->approved->profile->middlename ? $this->approved->profile->middlename[0] . '. ' : '') .
                $this->approved->profile->lastname .
                ($this->approved->profile->suffix ? ', ' . $this->approved->profile->suffix : ''))
                : null,
            'approved_date' => $this->approved_date,
            'is_disapproved' => $this->is_disapproved
        ];
    }
}
