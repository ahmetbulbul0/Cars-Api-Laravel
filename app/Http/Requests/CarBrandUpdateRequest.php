<?php

namespace App\Http\Requests;

use App\Models\CarBrand;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CarBrandUpdateRequest extends FormRequest
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
                Rule::unique(CarBrand::class)->ignore($this->carBrand->id),
            ],
            "country" => [
                "nullable",
                "string",
                "max:255",
            ],
            "foundedYear" => [
                "nullable",
                "integer",
                "digits:4",
                "min:1700", // Opsiyonel: Minimum değer (örneğin 1700 yılından önceki veriler geçersiz kabul edilebilir)
                "max:" . now()->year, // Kuruluş yılı geçerli yıldan büyük olamaz
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
            "name.string" => "The name must be a valid string.",
            "name.unique" => "The name has already been taken. Please choose a different one.",
            "country.string" => "The country must be a valid string.",
            "country.max" => "The country may not be greater than 255 characters.",
            "foundedYear.integer" => "The founded year must be a valid number.",
            "foundedYear.digits" => "The founded year must be exactly 4 digits.",
            "foundedYear.min" => "The founded year must be at least 1700.",
            "foundedYear.max" => "The founded year cannot be greater than the current year.",
        ];
    }
}
