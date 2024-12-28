<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarBrandStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", "string", "unique:car_brands,name"],
            "country" => ["required", "string", "max:255"],
            "foundedYear" => ["required", "integer", "digits:4"],
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "name.required" => "The name field is required.",
            "name.string" => "The name must be a valid string.",
            "name.unique" => "The name has already been taken. Please choose a different one.",
            "country.required" => "The country field is required.",
            "country.string" => "The country must be a valid string.",
            "country.max" => "The country may not be greater than 255 characters.",
            "foundedYear.required" => "The founded year field is required.",
            "foundedYear.integer" => "The founded year must be a valid number.",
            "foundedYear.digits" => "The founded year must be exactly 4 digits.",
        ];
    }
}
