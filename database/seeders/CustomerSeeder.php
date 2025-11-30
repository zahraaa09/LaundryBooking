<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {

            $user = User::create([
                'name' => "Customer $i",
                'email' => "customer$i@example.com",
                'phone' => "08123$i$i$i$i",
                'role' => 'customer',
                'password' => bcrypt('password'),
            ]);

            Customer::create([
                'user_id' => $user->id,
                'name' => "Customer $i",
                'phone' => "08123$i$i$i$i",
                'address' => "Alamat Customer $i",
            ]);
        }
    }
}
