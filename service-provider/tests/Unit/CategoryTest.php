<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\ServiceProviders;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_has_providers_relationship()
    {
        $category = Category::factory()->create();
        ServiceProviders::factory()->create(['category_id' => $category->id]);

        $this->assertCount(1, $category->providers);
        $this->assertInstanceOf(ServiceProviders::class, $category->providers->first());
    }
}
