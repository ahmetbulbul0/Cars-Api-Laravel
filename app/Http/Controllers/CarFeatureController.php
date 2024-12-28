<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CarFeatureCollection;
use App\Http\Controllers\Tools\ReqFilterGenerator;
use App\Models\CarFeature;

class CarFeatureController extends Controller
{
    public function index(Request $request)
    {
        $carFeatures = new CarFeature();

        $carFeatures = ReqFilterGenerator::limit($request, $carFeatures);

        $carFeatures = ReqFilterGenerator::paginate($request, $carFeatures);

        $response = response()->json([
            "data" => new CarFeatureCollection($carFeatures["data"]),
            "pagination" => $carFeatures["pagination"]
        ], 200);

        return $response;
    }
}
