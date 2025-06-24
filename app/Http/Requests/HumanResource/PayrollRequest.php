<?php

namespace App\Http\Requests\HumanResource;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PayrollRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
         switch($this->option){
            case 'cycle':
                return [
                    'month' => [
                        'sometimes',
                        'required',
                        Rule::unique('payroll_cycles')->where(function ($query) {
                            return $query->where('is_regular', 1)
                                        ->where('year', $this->year);
                        })
                    ],
                    'year' => 'sometimes|required',
                    'start' => 'sometimes|required',
                    'end' => 'sometimes|required',
                    'is_regular' => 'sometimes|required',
                ];
            break;
            default: 
                return [];
        }
    }
}
