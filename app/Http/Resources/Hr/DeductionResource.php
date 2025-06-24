<?php

namespace App\Http\Resources\Hr;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeductionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'amount' => $this->amount,
            'name' => $this->deduction->deduction->name,
            'is_regular' => $this->deduction->deduction->is_regular,
            'is_contribution' => $this->deduction->deduction->is_contribution,
            'is_loan' => $this->deduction->deduction->is_loan,
            'is_enrollable' => $this->deduction->deduction->is_enrollable,
        ]; 
    }
}
