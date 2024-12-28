<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarType;
use App\Models\CarBrand;
use App\Models\CarFeature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'model_name' => 'Corolla',
                'brand' => 'Toyota',
                'type' => 'Sedan',
                'production_year' => 2021,
                'color' => 'White',
                'engine_type' => 'Hybrid',
                'horsepower' => 121,
                'torque' => 142,
                'transmission' => 'CVT',
                'fuel_consumption' => 4.2,
                'price' => 25000,
                'features' => ['Air Conditioning', 'ABS', 'Cruise Control', 'Bluetooth Connectivity']
            ],
            [
                'model_name' => 'Civic',
                'brand' => 'Honda',
                'type' => 'Sedan',
                'production_year' => 2020,
                'color' => 'Black',
                'engine_type' => 'Gasoline',
                'horsepower' => 158,
                'torque' => 187,
                'transmission' => 'Automatic',
                'fuel_consumption' => 6.5,
                'price' => 22000,
                'features' => ['Backup Camera', 'Parking Sensors', 'Lane Keeping Assist']
            ],
            [
                'model_name' => 'Model S',
                'brand' => 'Tesla',
                'type' => 'Electric',
                'production_year' => 2022,
                'color' => 'Red',
                'engine_type' => 'Electric',
                'horsepower' => 1020,
                'torque' => 1050,
                'transmission' => 'Single-Speed',
                'fuel_consumption' => 0,
                'price' => 79999,
                'features' => ['Wireless Charging', 'Heads-Up Display', 'Collision Warning', 'Adaptive Headlights']
            ],
            [
                'model_name' => 'X5',
                'brand' => 'BMW',
                'type' => 'SUV',
                'production_year' => 2019,
                'color' => 'Blue',
                'engine_type' => 'Diesel',
                'horsepower' => 335,
                'torque' => 450,
                'transmission' => 'Automatic',
                'fuel_consumption' => 8.5,
                'price' => 60000,
                'features' => ['Traction Control', 'Sunroof', 'Premium Sound System']
            ],
            [
                'model_name' => 'Mustang',
                'brand' => 'Ford',
                'type' => 'Coupe',
                'production_year' => 2021,
                'color' => 'Yellow',
                'engine_type' => 'Gasoline',
                'horsepower' => 450,
                'torque' => 529,
                'transmission' => 'Manual',
                'fuel_consumption' => 10.2,
                'price' => 55000,
                'features' => ['Bluetooth Connectivity', 'Navigation System', 'Leather Upholstery']
            ],
            [
                'model_name' => 'Cayenne',
                'brand' => 'Porsche',
                'type' => 'SUV',
                'production_year' => 2020,
                'color' => 'Gray',
                'engine_type' => 'Gasoline',
                'horsepower' => 335,
                'torque' => 450,
                'transmission' => 'Automatic',
                'fuel_consumption' => 9.0,
                'price' => 67000,
                'features' => ['Parking Sensors', 'Electric Tailgate', 'Heated Seats']
            ],
            [
                'model_name' => 'Outlander',
                'brand' => 'Mitsubishi',
                'type' => 'SUV',
                'production_year' => 2021,
                'color' => 'Silver',
                'engine_type' => 'Plug-in Hybrid',
                'horsepower' => 221,
                'torque' => 450,
                'transmission' => 'Automatic',
                'fuel_consumption' => 3.2,
                'price' => 35000,
                'features' => ['Rain Sensing Wipers', 'Remote Start', 'All-Wheel Drive']
            ],
            [
                'model_name' => 'Polo',
                'brand' => 'Volkswagen',
                'type' => 'Hatchback',
                'production_year' => 2018,
                'color' => 'Green',
                'engine_type' => 'Diesel',
                'horsepower' => 95,
                'torque' => 200,
                'transmission' => 'Manual',
                'fuel_consumption' => 4.1,
                'price' => 15000,
                'features' => ['Air Conditioning', 'ABS', 'Traction Control']
            ],
            [
                'model_name' => 'Range Rover',
                'brand' => 'Land Rover',
                'type' => 'SUV',
                'production_year' => 2020,
                'color' => 'Black',
                'engine_type' => 'Diesel',
                'horsepower' => 395,
                'torque' => 550,
                'transmission' => 'Automatic',
                'fuel_consumption' => 9.2,
                'price' => 90000,
                'features' => ['Adaptive Headlights', 'Premium Sound System', 'Collision Warning']
            ],
            [
                'model_name' => 'Accord',
                'brand' => 'Honda',
                'type' => 'Sedan',
                'production_year' => 2022,
                'color' => 'Brown',
                'engine_type' => 'Hybrid',
                'horsepower' => 212,
                'torque' => 232,
                'transmission' => 'CVT',
                'fuel_consumption' => 5.0,
                'price' => 28000,
                'features' => ['Blind Spot Monitoring', 'Keyless Entry', 'Push Button Start']
            ]
        ];

        foreach ($cars as $carData) {
            $brand = CarBrand::where('name', $carData['brand'])->first();
            $type = CarType::where('name', $carData['type'])->first();

            $carData['brand_id'] = $brand->id;
            $carData['type_id'] = $type->id;
            $carFeatures = $carData["features"];

            unset($carData['brand'], $carData['type'], $carData["features"]);

            $car = Car::create($carData);

            $featureIds = CarFeature::whereIn('name', $carFeatures)->pluck('id');
            $car->features()->attach($featureIds);
        }
    }
}
