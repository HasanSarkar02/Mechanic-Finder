<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mechanic;

class MechanicsTableSeeder extends Seeder
{
    public function run()
    {
        Mechanic::create([
            'name' => 'John Doe',
            'location' => 'Ashuliya',
            'phone' => '123-456-7890',
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'rating' => 4.5,
        ]);

        Mechanic::create([
            'name' => 'Jane Smith',
            'location' => 'Dhaka',
            'phone' => '987-654-3210',
            'latitude' => 40.7306,
            'longitude' => -73.9352,
            'rating' => 4.0,
        ]);
    }
}
