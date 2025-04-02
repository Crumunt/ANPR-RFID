<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vehicles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Vehicle::create([
            'user_id' => 1,
            'license_plate' => 'ABC-123',
            'color' => 'green',
            'vehicle_make' => 'Ford',
            'vehicle_model' => 'Cobra',
            'orcr_id' => 1
        ]);
    }
}
