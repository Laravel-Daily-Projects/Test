<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsUnitTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_homepage_contains_empty_table(): void
    {
        $response = $this->get('/products');
 
        $response->assertStatus(200);
        $response->assertSee(__('No products found'));
    }

    public function test_homepage_contains_non_empty_table(): void 
    {
        Product::create([
            'name'  => 'Product 1',
            'price' => 123,
        ]);
 
        $response = $this->get('/products');
 
        $response->assertStatus(200);
        $response->assertDontSee(__('No products found'));
    } 
}
