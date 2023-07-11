<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\CarCollection;
use App\Http\Resources\CarTypeResource;
use App\Http\Resources\CarTypeCollection;
use App\Http\Requests\CarTypeStoreRequest;
use App\Http\Requests\CarTypeUpdateRequest;

class CarTypeController extends Controller
{
    public function index(Request $request)
    {
        $carTypes = new CarType();

        if ($request->limit) {
            $limit = intval($request->limit);
            $carTypes = $carTypes->limit($limit);
        }

        $carTypes = $carTypes->get();

        $response = response()->json([
            "data" => new CarTypeCollection($carTypes),
        ], 200);

        return $response;
    }

    public function store(CarTypeStoreRequest $request)
    {
        $name = $request->name;
        $name = Str::lower($name);
        $name = htmlspecialchars($name);

        $data = [
            "name" => $name
        ];

        $created = CarType::create($data);

        $response = response()->json([
            "created" => new CarTypeResource($created),
        ], 201);

        return $response;
    }

    public function show(CarType $carType)
    {
        $response = response()->json([
            "item" => new CarTypeResource($carType),
        ], 200);

        return $response;
    }

    public function update(CarTypeUpdateRequest $request, CarType $carType)
    {
        $data = [];
        $udatedColumns = [];

        if (isset($request->name)) {
            $name = Str::lower($request->name);
            $name = htmlspecialchars($request->name);
            $data["name"] = $name;
            $udatedColumns[] = "name";
        }

        CarType::where("id", $carType->id)->update($data);
        $updated = CarType::where("id", $carType->id)->first();

        $response = response()->json([
            "updated_old" => new CarTypeResource($carType),
            "updated_new" => new CarTypeResource($updated),
            "what_updated" => $udatedColumns
        ], 200);

        return $response;
    }

    public function destroy(CarType $carType)
    {
        $cars = Car::where("type", $carType->id)->get();

        Car::where("type", $carType->id)->delete();
        CarType::where("id", $carType->id)->delete();

        $response = response()->json([
            "deleted" => new CarTypeResource($carType),
            "deleted_relations" => [
                "cars" => new CarCollection($cars)
            ]
        ], 200);

        return $response;
    }
}
