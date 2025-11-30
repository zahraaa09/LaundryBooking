<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Laundry',
            'email' => 'admin@laundry.com',
            'phone' => '081234567890',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);
    }
}
