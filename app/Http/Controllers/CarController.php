<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Tools\ReqFilterGenerator;
use App\Models\Car;
use Illuminate\Support\Str;
use App\Http\Resources\CarResource;
use App\Http\Resources\CarCollection;
use App\Http\Requests\CarIndexRequest;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\CarCarFeature;

class CarController extends Controller
{
    public function index(CarIndexRequest $request)
    {
        $cars = new Car();

        $cars = $cars->with("brand", "type", "features");

        $cars = ReqFilterGenerator::limit($request, $cars);

        $cars = ReqFilterGenerator::paginate($request, $cars);

        $response = response()->json([
            "data" => new CarCollection($cars["data"]),
            "pagination" => $cars["pagination"]
        ], 200);

        return $response;
    }

    public function store(CarStoreRequest $request)
    {
        $modelName = Str::lower($request->modelName);
        $brandId = $request->brandId;
        $typeId = $request->typeId;
        $productionYear = $request->productionYear;
        $color = Str::lower($request->color);
        $engineType = Str::lower($request->engineType);
        $horsepower = $request->horsepower;
        $torque = $request->torque;
        $transmission = Str::lower($request->transmission);
        $fuelConsumption = $request->fuelConsumption;
        $price = $request->price;
        $features = $request->features;

        $data = [
            "model_name" => $modelName,
            "brand_id" => $brandId,
            "type_id" => $typeId,
            "production_year" => $productionYear,
            "color" => $color,
            "engine_type" => $engineType,
            "horsepower" => $horsepower,
            "torque" => $torque,
            "transmission" => $transmission,
            "fuel_consumption" => $fuelConsumption,
            "price" => $price,
        ];

        $created = Car::create($data);

        if (count($features) > 0) {
            foreach ($features as $featureId) {
                CarCarFeature::create([
                    "car_id" => $created->id,
                    "feature_id" => $featureId
                ]);
            }
        }

        $created = Car::where("id", $created->id)->with("brand", "type", "features")->first();

        $response = response()->json([
            "created" => new CarResource($created),
        ], 201);

        return $response;
    }

    public function show($carId)
    {
        $car = Car::where("id", $carId)->with("brand", "type", "features")->first();

        $response = response()->json([
            "item" => new CarResource($car),
        ], 200);

        return $response;
    }

    public function update(CarUpdateRequest $request, Car $car)
    {
        $updatableFields = [
            'name' => 'string',
            'type' => 'integer',
            'brand' => 'integer',
            'productionYear' => 'integer',
            'color' => 'string',
            'engineType' => 'string',
            'horsepower' => 'integer',
            'torque' => 'integer',
            'transmission' => 'string',
            'fuelConsumption' => 'numeric',
            'price' => 'numeric',
        ];

        $data = [];
        $updatedColumns = [];

        foreach ($updatableFields as $field => $type) {
            if ($request->has($field)) {
                $value = match ($type) {
                    'integer' => intval($request->$field),
                    'numeric' => floatval($request->$field),
                    'string' => htmlspecialchars($request->$field),
                    default => $request->$field,
                };
                $data[Str::snake($field)] = $value;
                $updatedColumns[] = $field;
            }
        }

        $car->update($data);

        if ($request->has('features')) {
            $car->features()->sync($request->features);
            $updatedColumns[] = 'features';
        }

        $updated = Car::with('features')->find($car->id);

        return response()->json([
            'updated_old' => new CarResource($car),
            'updated_new' => new CarResource($updated),
            'what_updated' => $updatedColumns,
        ], 200);
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return response()->json([
            'deleted' => new CarResource($car),
        ], 200);
    }

}
