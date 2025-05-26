<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\ServiceProviders;

class ServiceProvidersTest extends TestCase
{
    use RefreshDatabase;

    public function test_provider_belongs_to_category()
    {
        $category = Category::factory()->create();
        $provider = ServiceProviders::factory()->create(['category_id' => $category->id]);

        $this->assertInstanceOf(Category::class, $provider->category);
        $this->assertEquals($category->id, $provider->category->id);
    }
}
