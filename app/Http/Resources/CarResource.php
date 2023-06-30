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
            "name" => Str::title($this->name),
            "type" => new CarTypeResource(CarType::where("id", $this->type)->first()), // to-do = change to use whenLoaded
            "brand" => new CarBrandResource(CarBrand::where("id", $this->brand)->first()), // to-do = change to use whenLoaded
            "year" => $this->year
        ];
    }
}
