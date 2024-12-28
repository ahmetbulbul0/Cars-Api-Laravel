<?php

namespace Database\Seeders;

use App\Models\CarFeature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carFeatures = [
            [
                'name' => 'Air Conditioning',
                'description' => 'Automatic climate control system for optimal temperature.'
            ],
            [
                'name' => 'ABS',
                'description' => 'Anti-lock Braking System for enhanced safety.'
            ],
            [
                'name' => 'Traction Control',
                'description' => 'Prevents wheel slip during acceleration.'
            ],
            [
                'name' => 'Cruise Control',
                'description' => 'Maintains a steady speed without constant accelerator input.'
            ],
            [
                'name' => 'Parking Sensors',
                'description' => 'Assists with parking by detecting nearby obstacles.'
            ],
            [
                'name' => 'Bluetooth Connectivity',
                'description' => 'Wireless communication for devices.'
            ],
            [
                'name' => 'Backup Camera',
                'description' => 'Displays the area behind the vehicle while reversing.'
            ],
            [
                'name' => 'Navigation System',
                'description' => 'Built-in GPS for route guidance.'
            ],
            [
                'name' => 'Sunroof',
                'description' => 'Panel on the roof that opens for ventilation or light.'
            ],
            [
                'name' => 'Heated Seats',
                'description' => 'Seats with adjustable heating for comfort.'
            ],
            [
                'name' => 'Keyless Entry',
                'description' => 'Allows entry without using a physical key.'
            ],
            [
                'name' => 'Push Button Start',
                'description' => 'Starts the car with a button instead of a key.'
            ],
            [
                'name' => 'Blind Spot Monitoring',
                'description' => 'Alerts the driver about vehicles in blind spots.'
            ],
            [
                'name' => 'Lane Keeping Assist',
                'description' => 'Keeps the vehicle centered in its lane.'
            ],
            [
                'name' => 'Adaptive Headlights',
                'description' => 'Headlights that adjust with steering to improve visibility.'
            ],
            [
                'name' => 'Wireless Charging',
                'description' => 'Allows charging devices without cables.'
            ],
            [
                'name' => 'Premium Sound System',
                'description' => 'High-quality audio system for immersive sound.'
            ],
            [
                'name' => 'Remote Start',
                'description' => 'Start the car remotely for convenience.'
            ],
            [
                'name' => 'Leather Upholstery',
                'description' => 'Seats and interior covered with leather.'
            ],
            [
                'name' => 'All-Wheel Drive',
                'description' => 'Distributes power to all four wheels.'
            ],
            [
                'name' => 'Heads-Up Display',
                'description' => 'Displays information on the windshield.'
            ],
            [
                'name' => 'Electric Tailgate',
                'description' => 'Automatic opening and closing of the rear tailgate.'
            ],
            [
                'name' => 'Rain Sensing Wipers',
                'description' => 'Automatically activates wipers in the rain.'
            ],
            [
                'name' => 'Ambient Lighting',
                'description' => 'Interior lighting for enhanced aesthetics.'
            ],
            [
                'name' => 'Collision Warning',
                'description' => 'Warns the driver of potential collisions.'
            ],
        ];

        foreach ($carFeatures as $feature) {
            CarFeature::create($feature);
        }
    }
}
