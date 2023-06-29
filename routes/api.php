<?php

use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix("car-brand")->controller(CarBrandController::class)->group(function () {
    Route::get("/", "index");
    Route::get("{carBrand}", "show");
    Route::post("store", "store");
    Route::patch("{carBrand}", "update");
    Route::delete("{carBrand}", "destroy");
});

Route::prefix("car-type")->controller(CarTypeController::class)->group(function () {
    Route::get("/", "index");
    Route::get("{carType}", "show");
    Route::post("store", "store");
    Route::patch("{carType}", "update");
    Route::delete("{carType}", "destroy");
});
