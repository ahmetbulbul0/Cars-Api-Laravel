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
        $carBrands = [
            [
                'name' => 'Toyota',
                'country' => 'Japan',
                'founded_year' => 1937
            ],
            [
                'name' => 'Ford',
                'country' => 'USA',
                'founded_year' => 1903
            ],
            [
                'name' => 'Volkswagen',
                'country' => 'Germany',
                'founded_year' => 1937
            ],
            [
                'name' => 'Honda',
                'country' => 'Japan',
                'founded_year' => 1948
            ],
            [
                'name' => 'BMW',
                'country' => 'Germany',
                'founded_year' => 1916
            ],
            [
                'name' => 'Mercedes-Benz',
                'country' => 'Germany',
                'founded_year' => 1926
            ],
            [
                'name' => 'Hyundai',
                'country' => 'South Korea',
                'founded_year' => 1967
            ],
            [
                'name' => 'Nissan',
                'country' => 'Japan',
                'founded_year' => 1933
            ],
            [
                'name' => 'Chevrolet',
                'country' => 'USA',
                'founded_year' => 1911
            ],
            [
                'name' => 'Kia',
                'country' => 'South Korea',
                'founded_year' => 1944
            ],
            [
                'name' => 'Tesla',
                'country' => 'USA',
                'founded_year' => 2003
            ],
            [
                'name' => 'Peugeot',
                'country' => 'France',
                'founded_year' => 1810
            ],
            [
                'name' => 'Renault',
                'country' => 'France',
                'founded_year' => 1899
            ],
            [
                'name' => 'Fiat',
                'country' => 'Italy',
                'founded_year' => 1899
            ],
            [
                'name' => 'Jeep',
                'country' => 'USA',
                'founded_year' => 1941
            ],
            [
                'name' => 'Subaru',
                'country' => 'Japan',
                'founded_year' => 1953
            ],
            [
                'name' => 'Mazda',
                'country' => 'Japan',
                'founded_year' => 1920
            ],
            [
                'name' => 'Lexus',
                'country' => 'Japan',
                'founded_year' => 1989
            ],
            [
                'name' => 'Porsche',
                'country' => 'Germany',
                'founded_year' => 1931
            ],
            [
                'name' => 'Jaguar',
                'country' => 'UK',
                'founded_year' => 1935
            ],
            [
                'name' => 'Land Rover',
                'country' => 'UK',
                'founded_year' => 1948
            ],
            [
                'name' => 'Volvo',
                'country' => 'Sweden',
                'founded_year' => 1927
            ],
            [
                'name' => 'Ferrari',
                'country' => 'Italy',
                'founded_year' => 1939
            ],
            [
                'name' => 'Lamborghini',
                'country' => 'Italy',
                'founded_year' => 1963
            ],
            [
                'name' => 'Bentley',
                'country' => 'UK',
                'founded_year' => 1919
            ],
            [
                'name' => 'Aston Martin',
                'country' => 'UK',
                'founded_year' => 1913
            ],
            [
                'name' => 'Rolls-Royce',
                'country' => 'UK',
                'founded_year' => 1906
            ],
            [
                'name' => 'Mitsubishi',
                'country' => 'Japan',
                'founded_year' => 1870
            ],
            [
                'name' => 'Chrysler',
                'country' => 'USA',
                'founded_year' => 1925
            ],
            [
                'name' => 'Alfa Romeo',
                'country' => 'Italy',
                'founded_year' => 1910
            ],
            [
                'name' => 'Citroën',
                'country' => 'France',
                'founded_year' => 1919
            ],
            [
                'name' => 'Opel',
                'country' => 'Germany',
                'founded_year' => 1862
            ],
            [
                'name' => 'Skoda',
                'country' => 'Czech Republic',
                'founded_year' => 1895
            ],
            [
                'name' => 'Bugatti',
                'country' => 'France',
                'founded_year' => 1909
            ],
            [
                'name' => 'Pagani',
                'country' => 'Italy',
                'founded_year' => 1992
            ],
            [
                'name' => 'McLaren',
                'country' => 'UK',
                'founded_year' => 1963
            ],
            [
                'name' => 'Suzuki',
                'country' => 'Japan',
                'founded_year' => 1909
            ],
            [
                'name' => 'Dodge',
                'country' => 'USA',
                'founded_year' => 1900
            ],
            [
                'name' => 'Cadillac',
                'country' => 'USA',
                'founded_year' => 1902
            ],
        ];

        foreach ($carBrands as $brand) {
            CarBrand::create($brand);
        }
    }
}
