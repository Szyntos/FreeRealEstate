<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Property::create([
            'address' => '123 Main St',
            'description' => 'A beautiful home with 3 bedrooms and 2 baths.',
            'price' => 250000.00,
        ]);
    
        \App\Models\Property::create([
            'address' => '456 Oak Ave',
            'description' => 'A charming cottage with 2 bedrooms and 1 bath.',
            'price' => 150000.00,
        ]);
    }
    
}
