<?php

namespace Database\Seeders;

use App\Models\CarType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carTypes = [
            [
                'name' => 'Sedan',
                'description' => 'A compact or full-sized car with a separate trunk.'
            ],
            [
                'name' => 'SUV',
                'description' => 'Sports Utility Vehicle, larger and often all-wheel-drive.'
            ],
            [
                'name' => 'Hatchback',
                'description' => 'A small car with a rear door that swings upward.'
            ],
            [
                'name' => 'Coupe',
                'description' => 'A two-door car often sporty in nature.'
            ],
            [
                'name' => 'Convertible',
                'description' => 'A car with a retractable roof.'
            ],
            [
                'name' => 'Truck',
                'description' => 'A vehicle designed for transporting goods.'
            ],
            [
                'name' => 'Van',
                'description' => 'A larger vehicle for transporting people or cargo.'
            ],
            [
                'name' => 'Electric',
                'description' => 'A car powered by electricity rather than fuel.'
            ],
            [
                'name' => 'Hybrid',
                'description' => 'A car powered by both electricity and fuel.'
            ],
            [
                'name' => 'Crossover',
                'description' => 'A car combining features of a sedan and an SUV.'
            ],
        ];

        foreach ($carTypes as $type) {
            CarType::create($type);
        }
    }
}
