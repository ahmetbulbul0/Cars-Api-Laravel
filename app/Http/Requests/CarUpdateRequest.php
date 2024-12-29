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
                Rule::unique(Car::class)->ignore($this->car->id),
            ],
            "type" => [
                "nullable",
                "integer",
                "exists:car_types,id",
            ],
            "brand" => [
                "nullable",
                "integer",
                "exists:car_brands,id",
            ],
            "productionYear" => [
                "nullable",
                "integer",
                "digits:4",
                "min:1886", // İlk otomobil üretim yılı
                "max:" . now()->year,
            ],
            "color" => [
                "nullable",
                "string",
                "max:50",
            ],
            "engineType" => [
                "nullable",
                "string",
                "max:100",
            ],
            "horsepower" => [
                "nullable",
                "integer",
                "min:0",
            ],
            "torque" => [
                "nullable",
                "integer",
                "min:0",
            ],
            "transmission" => [
                "nullable",
                "string",
                "max:50",
            ],
            "fuelConsumption" => [
                "nullable",
                "numeric",
                "min:0",
            ],
            "price" => [
                "nullable",
                "numeric",
                "min:0",
            ],
            "features" => [
                "nullable",
                "array",
            ],
            "features.*" => [
                "integer",
                "exists:car_features,id",
            ],
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            "name.string" => "The car name must be a valid string.",
            "name.unique" => "The car name has already been taken.",
            "type.integer" => "The car type must be a valid integer.",
            "type.exists" => "The selected car type is invalid.",
            "brand.integer" => "The car brand must be a valid integer.",
            "brand.exists" => "The selected car brand is invalid.",
            "productionYear.integer" => "The production year must be a valid integer.",
            "productionYear.digits" => "The production year must be exactly 4 digits.",
            "productionYear.min" => "The production year must be at least 1886.",
            "productionYear.max" => "The production year cannot be greater than the current year.",
            "color.string" => "The color must be a valid string.",
            "color.max" => "The color may not be greater than 50 characters.",
            "engineType.string" => "The engine type must be a valid string.",
            "engineType.max" => "The engine type may not be greater than 100 characters.",
            "horsepower.integer" => "The horsepower must be a valid integer.",
            "horsepower.min" => "The horsepower must be at least 0.",
            "torque.integer" => "The torque must be a valid integer.",
            "torque.min" => "The torque must be at least 0.",
            "transmission.string" => "The transmission must be a valid string.",
            "transmission.max" => "The transmission may not be greater than 50 characters.",
            "fuelConsumption.numeric" => "The fuel consumption must be a valid number.",
            "fuelConsumption.min" => "The fuel consumption must be at least 0.",
            "price.numeric" => "The price must be a valid number.",
            "price.min" => "The price must be at least 0.",
            "features.array" => "The features must be a valid array.",
            "features.*.integer" => "Each feature must be a valid integer.",
            "features.*.exists" => "One or more selected features are invalid.",
        ];
    }
}
