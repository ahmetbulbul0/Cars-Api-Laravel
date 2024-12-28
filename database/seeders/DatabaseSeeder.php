<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CarTypeSeeder;
use Database\Seeders\CarBrandSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CarTypeSeeder::class,
            CarBrandSeeder::class,
            CarFeatureSeeder::class,
            CarSeeder::class
        ]);
    }
}
