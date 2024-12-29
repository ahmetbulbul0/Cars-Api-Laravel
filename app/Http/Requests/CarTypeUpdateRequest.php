<?php

namespace App\Http\Requests;

use App\Models\CarType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CarTypeUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => [
                "nullable",
                "string",
                Rule::unique(CarType::class)->ignore($this->carType->id),
            ],
            "description" => [
                "nullable",
                "string",
                "max:1000",
            ],
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            "name.string" => "The name must be a valid string.",
            "name.unique" => "The name has already been taken. Please choose a different one.",
            "description.string" => "The description must be a valid string.",
            "description.max" => "The description may not be greater than 1000 characters.",
        ];
    }
}
