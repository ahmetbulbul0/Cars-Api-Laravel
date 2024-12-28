<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
            "modelName" => ["required", "string", "unique:cars,model_name"],
            "brandId" => ["required", "exists:car_brands,id"],
            "typeId" => ["required", "exists:car_types,id"],
            "productionYear" => ["required", "integer", "digits:4"],
            "color" => ["required", "string", "max:50"],
            "engineType" => ["required", "string", "max:50"],
            "horsepower" => ["required", "integer", "min:0"],
            "torque" => ["required", "integer", "min:0"],
            "transmission" => ["required", "string", "max:50"],
            "fuelConsumption" => ["required", "numeric", "min:0"],
            "price" => ["required", "numeric", "min:0"],
            "features" => ["array"],
            "features.*" => ["exists:car_features,id"],
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
            "modelName.required" => "The model name field is required.",
            "modelName.string" => "The model name must be a valid string.",
            "modelName.unique" => "The model name has already been taken. Please choose a different one.",
            "brandId.required" => "The brand field is required.",
            "brandId.exists" => "The selected brand does not exist.",
            "typeId.required" => "The type field is required.",
            "typeId.exists" => "The selected type does not exist.",
            "productionYear.required" => "The production year field is required.",
            "productionYear.integer" => "The production year must be a valid number.",
            "productionYear.digits" => "The production year must be exactly 4 digits.",
            "color.required" => "The color field is required.",
            "color.string" => "The color must be a valid string.",
            "color.max" => "The color may not be greater than 50 characters.",
            "engineType.required" => "The engine type field is required.",
            "engineType.string" => "The engine type must be a valid string.",
            "engineType.max" => "The engine type may not be greater than 50 characters.",
            "horsepower.required" => "The horsepower field is required.",
            "horsepower.integer" => "The horsepower must be a valid number.",
            "horsepower.min" => "The horsepower must be at least 0.",
            "torque.required" => "The torque field is required.",
            "torque.integer" => "The torque must be a valid number.",
            "torque.min" => "The torque must be at least 0.",
            "transmission.required" => "The transmission field is required.",
            "transmission.string" => "The transmission must be a valid string.",
            "transmission.max" => "The transmission may not be greater than 50 characters.",
            "fuelConsumption.required" => "The fuel consumption field is required.",
            "fuelConsumption.numeric" => "The fuel consumption must be a valid number.",
            "fuelConsumption.min" => "The fuel consumption must be at least 0.",
            "price.required" => "The price field is required.",
            "price.numeric" => "The price must be a valid number.",
            "price.min" => "The price must be at least 0.",
            "features.array" => "The features must be an array.",
            "features.*.exists" => "One or more selected features do not exist.",
        ];
    }
}
