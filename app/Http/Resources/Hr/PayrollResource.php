<?php

namespace App\Http\Resources\Hr;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PayrollResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $rawSalary = (float) str_replace(['₱', ','], '', $this->organization->salary->amount);
        $rawDeductions = (float) $this->total_deductions;
        $net = round($rawSalary - $rawDeductions, 2);

        $firstHalf = round($net / 2, 2);
        $secondHalf = round($net - $firstHalf, 2);

        return [
            'id' => $this->id,
            'username' => $this->username,
            'name' => $this->profile->lastname.', '.$this->profile->firstname.' '.$this->profile->middlename[0].'.',
            'position' => $this->organization->position->name,
            'salary' => $this->organization->salary->amount,
            'deductions' => '₱' . number_format($rawDeductions, 2),
            'net' => '₱' . number_format($net, 2),
            'first' => '₱' . number_format($firstHalf, 2),
            'second' => '₱' . number_format($secondHalf, 2),
        ];
    }
}
