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
        CarType::insert([
            ["name" => "micro"],
            ["name" => "sedan"],
            ["name" => "hatchback"],
            ["name" => "liftback"],
            ["name" => "coupe"],
            ["name" => "cabriolet"],
            ["name" => "roadster"],
            ["name" => "targa"],
            ["name" => "limousine"],
            ["name" => "muscle"],
            ["name" => "sport"],
            ["name" => "super"],
            ["name" => "suv"],
            ["name" => "crossover"],
            ["name" => "pickup"],
            ["name" => "van"],
            ["name" => "minivan"],
            ["name" => "minibus"],
            ["name" => "campervan"]
        ]);
    }
}
