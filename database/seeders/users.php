<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'jDoe@clsu2.edu.ph',
            'password' => Hash::make('password'),
        ]);

        $security = User::create([
            'first_name' => 'Lorem',
            'last_name' => 'Ipsum',
            'email' => 'lIpsum@clsu2.edu.ph',
            'password' => Hash::make('password'),
        ]);

        $user = User::create([
            'first_name' => 'Vincent',
            'last_name' => 'Xander',
            'email' => 'vjxander@clsu2.edu.ph',
            'password' => Hash::make('password'),
            'address' => '123 Main St, Anytown, USA',
            'license_plate' => 'ABC123',
        ]);
    }
}
