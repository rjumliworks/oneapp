<?php

namespace App\Http\Requests\HumanResource;

use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
            'date' => 'required',
            'title' => 'required',
            'venue' => [
                function ($attribute, $value, $fail) {
                    if (!in_array($this->type, ['Holiday', 'Leave']) && empty($value)) {
                        $fail('The venue field is required');
                    }
                },
            ],
            'description' => [
                function ($attribute, $value, $fail) {
                    if ($this->type !== 'Holiday' && empty($value)) {
                        $fail('The description field is required.');
                    }
                },
            ],
        ];
    }
}
