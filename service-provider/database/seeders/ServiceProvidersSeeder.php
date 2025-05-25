<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceProviders;

class ServiceProvidersSeeder extends Seeder
{
    public function run(): void
    {
        ServiceProviders::factory()->count(100)->create();
    }
}
