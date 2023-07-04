<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\CarCollection;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Http\Resources\CarResource;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        $response = response()->json([
            "data" => new CarCollection($cars),
        ], 200);

        return $response;
    }

    public function store(CarStoreRequest $request)
    {
        $name = $request->name;
        $name = Str::lower($name);
        $name = htmlspecialchars($name);

        $type = intval($request->type);
        $brand = intval($request->brand);

        $data = [
            "name" => $name,
            "type" => $type,
            "brand" => $brand,
        ];

        $created = Car::create($data);

        $response = response()->json([
            "created" => new CarResource($created),
        ], 201);

        return $response;
    }

    public function show(Car $car)
    {
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
