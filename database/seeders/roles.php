<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $roles = [
            'admin',
            'security',
            'user',
        ];
        
        foreach ($roles as $role) {
            Role::create([
                'role_name' => $role,
            ]);
        }
    }
}
