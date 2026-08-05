<?php

namespace Tests\Feature;

use App\Models\Coffee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CoffeeManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_coffee_and_it_appears_on_the_menu(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($admin);

        $response = $this->post('/admin/addcoffee', [
            'name' => 'Coconut Latte',
            'description' => 'Creamy coconut flavor with espresso.',
            'category' => 'Hot Coffee',
            'roast_type' => 'Medium Roast',
            'price' => '4.90',
            'image_url' => 'https://example.com/coffee.jpg',
            'is_available' => '1',
            'is_featured' => '1',
            'is_customizable' => '1',
        ]);

        $response->assertRedirect('/admin/addcoffee');
        $this->assertDatabaseHas('coffees', ['name' => 'Coconut Latte']);

        $menuResponse = $this->get('/menu');
        $menuResponse->assertOk();
        $menuResponse->assertSee('Coconut Latte');
    }

    public function test_admin_can_edit_and_delete_a_coffee(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($admin);

        $coffee = Coffee::create([
            'name' => 'Original Blend',
            'description' => 'Classic espresso.',
            'category' => 'Hot Coffee',
            'roast_type' => 'Medium Roast',
            'price' => 3.25,
            'image_url' => 'https://example.com/original.jpg',
            'is_available' => true,
            'is_featured' => false,
            'is_customizable' => true,
        ]);

        $editResponse = $this->put("/admin/addcoffee/{$coffee->id}", [
            'name' => 'Updated Blend',
            'description' => 'A richer flavor.',
            'category' => 'Specialty',
            'roast_type' => 'Dark Roast',
            'price' => 4.50,
            'image_url' => 'https://example.com/updated.jpg',
            'is_available' => '1',
            'is_featured' => '1',
            'is_customizable' => '1',
        ]);

        $editResponse->assertRedirect('/admin/addcoffee');
        $this->assertDatabaseHas('coffees', ['id' => $coffee->id, 'name' => 'Updated Blend']);

        $deleteResponse = $this->delete("/admin/addcoffee/{$coffee->id}");
        $deleteResponse->assertRedirect('/admin/addcoffee');
        $this->assertDatabaseMissing('coffees', ['id' => $coffee->id]);
    }
}
