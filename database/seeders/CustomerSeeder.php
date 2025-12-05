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
                'phone' => "082349231601",
                'role' => 'customer',
                'password' => bcrypt('password'),
            ]);

            Customer::create([
                'user_id' => $user->id,
                'name' => "Customer $i",
                'phone' => "082349231601",
                'address' => "Alamat Customer $i",
            ]);
        }
    }
}
