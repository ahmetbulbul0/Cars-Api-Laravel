<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBrand;
use Illuminate\Support\Str;
use App\Http\Resources\CarCollection;
use App\Http\Resources\CarBrandResource;
use App\Http\Resources\CarBrandCollection;
use App\Http\Requests\CarBrandStoreRequest;
use App\Http\Requests\CarBrandUpdateRequest;

class CarBrandController extends Controller
{
    public function index()
    {
        $carBrands = CarBrand::all();

        $response = response()->json([
            "data" => new CarBrandCollection($carBrands),
        ], 200);

        return $response;
    }

    public function store(CarBrandStoreRequest $request)
    {
        $name = $request->name;
        $name = Str::lower($name);
        $name = htmlspecialchars($name);

        $data = [
            "name" => $name
        ];

        $created = CarBrand::create($data);

        $response = response()->json([
            "created" => new CarBrandResource($created),
        ], 201);

        return $response;
    }

    public function show(CarBrand $carBrand)
    {
        $response = response()->json([
            "item" => new CarBrandResource($carBrand),
        ], 200);

        return $response;
    }

    public function update(CarBrandUpdateRequest $request, CarBrand $carBrand)
    {
        $data = [];
        $udatedColumns = [];

        if (isset($request->name)) {
            $name = Str::lower($request->name);
            $name = htmlspecialchars($request->name);
            $data["name"] = $name;
            $udatedColumns[] = "name";
        }

        CarBrand::where("id", $carBrand->id)->update($data);
        $updated = CarBrand::where("id", $carBrand->id)->first();

        $response = response()->json([
            "updated_old" => new CarBrandResource($carBrand),
            "updated_new" => new CarBrandResource($updated),
            "what_updated" => $udatedColumns
        ], 200);

        return $response;
    }

    public function destroy(CarBrand $carBrand)
    {
        $cars = Car::where("type", $carBrand->id)->get();

        Car::where("type", $carBrand->id)->delete();
        CarBrand::where("id", $carBrand->id)->delete();

        $response = response()->json([
            "deleted" => new CarBrandResource($carBrand),
            "deleted_relations" => [
                "cars" => new CarCollection($cars)
            ]
        ], 200);

        return $response;
    }
}
