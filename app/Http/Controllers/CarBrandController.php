<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBrand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\CarCollection;
use App\Http\Resources\CarBrandResource;
use App\Http\Resources\CarBrandCollection;
use App\Http\Requests\CarBrandStoreRequest;
use App\Http\Requests\CarBrandUpdateRequest;
use App\Http\Controllers\Tools\ReqFilterGenerator;

class CarBrandController extends Controller
{
    public function index(Request $request)
    {
        $carBrands = new CarBrand();

        $carBrands = ReqFilterGenerator::limit($request, $carBrands);

        $carBrands = ReqFilterGenerator::paginate($request, $carBrands);

        $response = response()->json([
            "data" => new CarBrandCollection($carBrands["data"]),
            "pagination" => $carBrands["pagination"]
        ], 200);

        return $response;
    }

    public function store(CarBrandStoreRequest $request)
    {
        $name = Str::lower($request->name);
        $country = Str::lower($request->country);
        $foundedYear = intval($request->foundedYear);

        $data = [
            "name" => $name,
            "country" => $country,
            "founded_year" => $foundedYear,
        ];

        $created = CarBrand::create($data);

        $response = response()->json([
            "created" => new CarBrandResource($created),
        ], 201);

        return $response;
    }

    public function show($carBrandId)
    {
        $carBrand = CarBrand::where("id", $carBrandId)->first();

        $response = response()->json([
            "item" => new CarBrandResource($carBrand),
        ], 200);

        return $response;
    }

    public function update(CarBrandUpdateRequest $request, CarBrand $carBrand)
    {
        $data = [];
        $updatedColumns = [];

        if ($request->has('name')) {
            $name = Str::lower(htmlspecialchars($request->name));
            $data['name'] = $name;
            $updatedColumns[] = 'name';
        }

        if ($request->has('country')) {
            $country = htmlspecialchars($request->country);
            $data['country'] = $country;
            $updatedColumns[] = 'country';
        }

        if ($request->has('foundedYear')) {
            $foundedYear = (int) $request->foundedYear;
            $data['founded_year'] = $foundedYear;
            $updatedColumns[] = 'foundedYear';
        }

        if (!empty($data)) {
            $carBrand->update($data);
        }

        $updated = CarBrand::find($carBrand->id);

        return response()->json([
            'updated_old' => new CarBrandResource($carBrand),
            'updated_new' => new CarBrandResource($updated),
            'what_updated' => $updatedColumns,
        ], 200);
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
