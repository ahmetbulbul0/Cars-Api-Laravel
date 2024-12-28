<?php

namespace App\Http\Resources;

use App\Models\CarType;
use App\Models\CarBrand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "modelName" => $this->model_name,
            "brandId" => $this->brand_id,
            "typeId" => $this->type_id,
            "productionYear" => $this->production_year,
            "color" => $this->color,
            "engineType" => $this->engine_type,
            "horsepower" => $this->horsepower,
            "torque" => $this->torque,
            "transmission" => $this->transmission,
            "fuelConsumption" => $this->fuel_consumption,
            "price" => $this->price,

            'brand' => new CarBrandResource($this->whenLoaded('brand')),
            'type' => new CarTypeResource($this->whenLoaded('type')),
            'features' => CarFeatureResource::collection($this->whenLoaded('features')),
        ];
    }
}
