<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
            [
                'address' => '123 Main St',
                'description' => 'A beautiful single-family home',
                'price' => 250000,
            ],
            [
                'address' => '456 Maple Ave',
                'description' => 'Spacious condo with modern amenities',
                'price' => 320000,
            ],
            [
                'address' => '789 Oak Dr',
                'description' => 'Cozy bungalow in a quiet neighborhood',
                'price' => 180000,
            ],
            [
                'address' => '101 Pine Ln',
                'description' => 'Luxurious mansion with a pool',
                'price' => 1250000,
            ],
            [
                'address' => '202 Birch Rd',
                'description' => 'Charming cottage with a garden',
                'price' => 220000,
            ],
            [
                'address' => '303 Cedar St',
                'description' => 'Modern apartment in the city center',
                'price' => 450000,
            ],
            [
                'address' => '404 Elm Blvd',
                'description' => 'Historic home with lots of character',
                'price' => 300000,
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
