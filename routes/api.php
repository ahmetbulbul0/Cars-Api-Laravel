<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarTypeController;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarFeatureController;

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

Route::prefix("car-type")->controller(CarTypeController::class)->group(function () {
    Route::get("/", "index");
    Route::get("{carTypeId}", "show");
    Route::post("store", "store");
    Route::patch("{carType}", "update");
    Route::delete("{carType}", "destroy");
});

Route::prefix("car-brand")->controller(CarBrandController::class)->group(function () {
    Route::get("/", "index");
    Route::get("{carBrandId}", "show");
    Route::post("store", "store");
    Route::patch("{carBrand}", "update");
    Route::delete("{carBrand}", "destroy");
});

Route::prefix("car")->controller(CarController::class)->group(function () {
    Route::get("/", "index");
    Route::get("{carId}", "show");
    Route::post("store", "store");
    Route::patch("{car}", "update");
    Route::delete("{car}", "destroy");
});

Route::prefix("car-feature")->controller(CarFeatureController::class)->group(function () {
    Route::get("/", "index");
});
