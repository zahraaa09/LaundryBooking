<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::insert([
            [
                'name' => 'Cuci Kering',
                'price' => 7000,
                'duration_days' => 2,
            ],
            [
                'name' => 'Setrika',
                'price' => 5000,
                'duration_days' => 1,
            ],
            [
                'name' => 'Paket Express',
                'price' => 12000,
                'duration_days' => 1,
            ],
        ]);
    }
}
