<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarTypeStoreRequest extends FormRequest
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
            "name" => ["required", "string", "unique:car_types,name"],
            "description" => ["nullable", "string", "max:1000"],
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
            "description.string" => "The description must be a valid string.",
            "description.max" => "The description may not be greater than 1000 characters.",
        ];
    }
}
