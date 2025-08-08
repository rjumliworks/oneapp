<?php

namespace App\Http\Requests\Vrams;

use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'purpose' => 'sometimes|required',
            'destination' => 'sometimes|required',
            'expenses' => 'required|array|min:1',
            'tags' => 'required|array|min:1',
            'expense_id' => 'sometimes|required|integer',
            'mode_id' => 'sometimes|required|integer',
            'transpo_id' => 'required_if:mode_id,151',
            'vehicle' => 'required_if:mode_id,150',
            'date' => 'sometimes|required',
            'time' => 'sometimes|required',
            'remarks' => 'nullable|string',
            'document' => 'nullable|mimes:pdf|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'purpose.required' => 'Please provide the purpose of travel.',
            'purpose.string' => 'Purpose must be a valid text.',
            'purpose.max' => 'Purpose must not exceed 255 characters.',

            'destination.required' => 'Please enter your travel destination.',
            'destination.string' => 'Destination must be a valid text.',
            'destination.max' => 'Destination must not exceed 255 characters.',

            'remarks.string' => 'Remarks must be a valid text.',
            'remarks.max' => 'Remarks must not exceed 255 characters.',

            'date.required' => 'Please select a travel date.',
            'date.string' => 'Date must be a valid format.',

            'time.required' => 'Please specify time.',
            'time.string' => 'Time must be a valid format.',

            'mode_id.required' => 'Please select a mode of travel.',
            'mode_id.exists' => 'The selected mode of travel is invalid.',

            'transpo_id.required_if' => 'Please select transpo.',
            'vehicle.required_if' => 'Please select vehicle.',

            'expense_id.required' => 'Please select a travel expense type.',
            'expense_id.exists' => 'The selected expense type is invalid.',

            'expenses.array' => 'Expenses must be a valid list.',
            'expenses.required' => 'Please select at least one expense.',

            'tags.required' => 'Please select at least one employee.',

            'document.file' => 'The travel document must be a valid file.',
            'document.mimes' => 'The travel document must be a PDF file.',
            'document.max' => 'The travel document must not exceed 2MB.',
        ];
    }
}
