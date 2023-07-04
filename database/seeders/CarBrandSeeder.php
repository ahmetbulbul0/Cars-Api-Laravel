<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarBrand::insert([
            ["name" => "Alfa Romeo"],
            ["name" => "Aston Martin"],
            ["name" => "Audi"],
            ["name" => "Bentley"],
            ["name" => "BMW"],
            ["name" => "Bugatti"],
            ["name" => "Buick"],
            ["name" => "Cadillac"],
            ["name" => "Chery"],
            ["name" => "Chevrolet"],
            ["name" => "Chrysler"],
            ["name" => "Citroen"],
            ["name" => "Dacia"],
            ["name" => "Daewoo"],
            ["name" => "Daihatsu"],
            ["name" => "Dodge"],
            ["name" => "Ferrari"],
            ["name" => "Fiat"],
            ["name" => "Ford"],
            ["name" => "Geely"],
            ["name" => "Honda"],
            ["name" => "Hyundai"],
            ["name" => "Infiniti"],
            ["name" => "Isuzu"],
            ["name" => "Iveco"],
            ["name" => "Jaguar"],
            ["name" => "Jeep"],
            ["name" => "Kia"],
            ["name" => "Lada"],
            ["name" => "Lamborghini"],
            ["name" => "Lancia"],
            ["name" => "Land-rover"],
            ["name" => "Lexus"],
            ["name" => "Lincoln"],
            ["name" => "Lotus"],
            ["name" => "Maserati"],
            ["name" => "Mazda"],
            ["name" => "McLaren"],
            ["name" => "Mercedes-Benz"],
            ["name" => "Mini"],
            ["name" => "Mitsubishi"],
            ["name" => "Nissan"],
            ["name" => "Opel"],
            ["name" => "Peugeot"],
            ["name" => "Porsche"],
            ["name" => "Proton"],
            ["name" => "Renault"],
            ["name" => "Rolls Royce"],
            ["name" => "Rover"],
            ["name" => "Saab"],
            ["name" => "Seat"],
            ["name" => "Skoda"],
            ["name" => "Smart"],
            ["name" => "Ssangyong"],
            ["name" => "Subaru"],
            ["name" => "Suzuki"],
            ["name" => "Tata"],
            ["name" => "Tofaş"],
            ["name" => "Toyota"],
            ["name" => "Volkswagen"],
            ["name" => "Volvo"],
        ]);
    }
}
