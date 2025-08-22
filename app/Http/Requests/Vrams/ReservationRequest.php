<?php

namespace App\Http\Requests\Vrams;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

      public function rules(): array
    {
        return [
            'purpose' => 'sometimes|required',
            'address' => 'sometimes|required',
            'tags' => 'required|array|min:1',
            'date' => 'sometimes|required',
            'time' => 'sometimes|required',
            'vehicle' => 'sometimes|required',
            'remarks' => 'nullable|string',
            'document' => 'nullable|mimes:pdf|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Please provide the destination.',

            'purpose.required' => 'Please provide the purpose of travel.',
            'purpose.string' => 'Purpose must be a valid text.',
            'purpose.max' => 'Purpose must not exceed 255 characters.',

            'remarks.string' => 'Remarks must be a valid text.',
            'remarks.max' => 'Remarks must not exceed 255 characters.',

            'date.required' => 'Please select a travel date.',
            'date.string' => 'Date must be a valid format.',

            'time.required' => 'Please specify the departure time.',
            'time.string' => 'Time must be a valid format.',

            'vehicle.required' => 'Please select a vehicle.',
            'vehicle.exists' => 'The selected vehicle is invalid.',

            'tags.required' => 'Please select at least one employee.',

            'document.file' => 'The travel document must be a valid file.',
            'document.mimes' => 'The travel document must be a PDF file.',
            'document.max' => 'The travel document must not exceed 2MB.',
        ];
    }
}
