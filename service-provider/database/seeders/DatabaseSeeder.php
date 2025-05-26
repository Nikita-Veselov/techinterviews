<?php

namespace Database\Seeders;

use App\Models\ServiceProviders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Category::insert([
            ['name' => 'Design'],
            ['name' => 'Development'],
            ['name' => 'Marketing'],
            ['name' => 'Consulting'],
            ['name' => 'Support'],
        ]);

        \App\Models\ServiceProviders::factory()->count(10000)->create();
    }
}
