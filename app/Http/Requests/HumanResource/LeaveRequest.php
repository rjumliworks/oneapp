<?php

namespace App\Http\Requests\HumanResource;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type_id' => 'sometimes|required',
            'detail_id' => 'sometimes|required',
            'details' => 'required_if:detail.others,specify illness,specify reason,specify',
            'dates' => 'sometimes|required|array|min:1',
            'dates.*.date' => 'required|date',
            'dates.*.timeOfDay' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'type_id.required' => 'The type field is required.',
            'detail_id.required' => 'The detail field is required.',

            'details.required_if' => 'Details are required when others is set to "Specify Illness", "Specify Reason", or "Specify".',

            'dates.required' => 'At least one date is required.',
            'dates.array' => 'Dates must be in a valid list.',
            'dates.min' => 'You must select at least one date.',

            'dates.*.date.required' => 'Each date is required.',
            'dates.*.date.date' => 'Each date must be a valid date.',

            'dates.*.timeOfDay.required' => 'Each time of day is required.',
            'dates.*.timeOfDay.string' => 'Each time of day must be a valid string.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $my = $this->input('my_credits');
            $need = $this->input('need_credits');

            if ($my < $need) {
                $validator->errors()->add('need_credits', 'You do not have enough credits.');
            }
        });
    }
}
