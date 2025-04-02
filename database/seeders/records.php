<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class records extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Record::create([
            'license_plate' => 'ABC-123',
            'status_id' => 1,
            'logged_in' => now(),
            'logged_out' => now(),
            'color' => 'green',
            'has_gate_pass' => 1
        ]);
    }
}
