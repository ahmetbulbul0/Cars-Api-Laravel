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
        $data = [];
        $udatedColumns = [];

        if (isset($request->name)) {
            $name = Str::lower($request->name);
            $name = htmlspecialchars($request->name);
            $data["name"] = $name;
            $udatedColumns[] = "name";
        }
        if (isset($request->type)) {
            $type = intval($request->type);
            $data["type"] = $type;
            $updatedColumns[] = "type";
        }
        if (isset($request->brand)) {
            $brand = intval($request->brand);
            $data["brand"] = $brand;
            $updatedColumns[] = "brand";
        }

        Car::where("id", $car->id)->update($data);
        $updated = Car::where("id", $car->id)->first();

        $response = response()->json([
            "updated_old" => new CarResource($car),
            "updated_new" => new CarResource($updated),
            "what_updated" => $udatedColumns
        ], 200);

        return $response;
    }

    public function destroy(Car $car)
    {
        Car::where("id", $car->id)->delete();

        $response = response()->json([
            "deleted" => new CarResource($car),
        ], 200);

        return $response;
    }
}
