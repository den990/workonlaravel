<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateGuestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->has('phone')) {
            $this->merge([
                'phone' => ltrim($this->phone, '+'),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $guestId = $this->route('id');

        return [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:guests,email,' . $guestId,
            'phone' => [
                'sometimes',
                'required',
                'string',
                'unique:guests,phone,' . $guestId,
                'regex:/^\+?\d{11,12}$/',
                function ($attribute, $value, $fail) {
                    $digitsOnly = str_replace('+', '', $value);
                    if (strlen($digitsOnly) !== 11) {
                        $fail('Phone number must contain 11 digits without "+" or 12 digits with "+".');
                    }
                }
            ],
            'country' => 'string|max:255'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $errors
        ], 422));
    }
}
