<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\ServiceProviders;

class ServiceProviderListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_displays_providers()
    {
    $category = \App\Models\Category::factory()->create();

    $provider = \App\Models\ServiceProviders::factory()->create([
        'category_id' => $category->id,
    ]);

    $response = $this->get('/providers');

    $response->assertStatus(200);
    $response->assertSee($provider->name);
    }

    public function test_index_filters_by_category()
    {
        $catA = Category::factory()->create(['name' => 'A']);
        $catB = Category::factory()->create(['name' => 'B']);

        $inA = ServiceProviders::factory()->create(['category_id' => $catA->id]);
        $inB = ServiceProviders::factory()->create(['category_id' => $catB->id]);

        $response = $this->get('/providers?category=' . $catA->id);

        $response->assertStatus(200);
        $response->assertSee($inA->name);
        $response->assertDontSee($inB->name);
    }
    public function test_provider_profile_page_displays_details()
    {
        $category = \App\Models\Category::factory()->create(['name' => 'Development']);

        $provider = \App\Models\ServiceProviders::factory()->create([
            'name' => 'TestCo',
            'description' => 'A test service provider.',
            'logo' => 'https://example.com/logo.png',
            'category_id' => $category->id,
        ]);

        $response = $this->get('/providers/' . $provider->id);

        $response->assertStatus(200);
        $response->assertSee('TestCo');
        $response->assertSee('A test service provider.');
        $response->assertSee('Development');
    }
}
