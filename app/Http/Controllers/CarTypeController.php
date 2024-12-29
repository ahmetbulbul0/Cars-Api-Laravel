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
use App\Http\Controllers\Tools\ReqFilterGenerator;

class CarTypeController extends Controller
{
    public function index(Request $request)
    {
        $carTypes = new CarType();

        $carTypes = ReqFilterGenerator::limit($request, $carTypes);

        $carTypes = ReqFilterGenerator::paginate($request, $carTypes);

        $response = response()->json([
            "data" => new CarTypeCollection($carTypes["data"]),
            "pagination" => $carTypes["pagination"]
        ], 200);

        return $response;
    }

    public function store(CarTypeStoreRequest $request)
    {
        $data = [
            "name" => Str::lower($request->name),
            "description" => Str::lower($request->description),
        ];

        $created = CarType::create($data);

        $response = response()->json([
            "created" => new CarTypeResource($created),
        ], 201);

        return $response;
    }

    public function show($carTypeId)
    {
        $carType = CarType::where("id", $carTypeId)->first();

        $response = response()->json([
            "item" => new CarTypeResource($carType),
        ], 200);

        return $response;
    }

    public function update(CarTypeUpdateRequest $request, CarType $carType)
    {
        $data = [];
        $updatedColumns = [];

        if ($request->has('name')) {
            $name = Str::lower($request->name);
            $data['name'] = $name;
            $updatedColumns[] = 'name';
        }

        if ($request->has('description')) {
            $description = $request->description;
            $data['description'] = $description;
            $updatedColumns[] = 'description';
        }

        if (!empty($data)) {
            $carType->update($data);
        }

        $updated = CarType::find($carType->id);

        return response()->json([
            'updated_old' => new CarTypeResource($carType),
            'updated_new' => new CarTypeResource($updated),
            'what_updated' => $updatedColumns,
        ], 200);
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
