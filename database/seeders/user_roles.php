<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;

class user_roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        for($i = 1; $i <= 3; $i++) {
            UserRole::create([
                'user_id' => $i,
                'role_id' => $i,
            ]);
        }
    }
}
