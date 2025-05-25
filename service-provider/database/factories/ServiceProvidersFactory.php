<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceProvidersFactory extends Factory
{
    public function definition(): array
    {
        $categories = ['Design', 'Development', 'Marketing', 'Consulting', 'Support'];

        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'logo' => 'https://ui-avatars.com/api/?name=' . urlencode($this->faker->company) . '&background=random',
            'category_id' => Category::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
