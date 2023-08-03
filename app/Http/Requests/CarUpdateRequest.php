<?php

namespace App\Http\Requests;

use App\Models\Car;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CarUpdateRequest extends FormRequest
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
                Rule::unique(Car::class)->ignore($this->car->id)
            ],
            "type" => [
                "nullable",
                "integer",
                "exists:car_types,id"
            ],
            "brand" => [
                "nullable",
                "integer",
                "exists:car_brands,id"
            ]
        ];
    }
}
