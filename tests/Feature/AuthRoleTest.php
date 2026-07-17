<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthRoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_user_is_redirected_to_admin_dashboard_after_login(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('Admin@12345'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'Admin@12345',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_customer_user_is_redirected_to_customer_dashboard_after_login(): void
    {
        $user = User::factory()->create([
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_cannot_access_customer_dashboard(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($admin);

        $response = $this->get('/dashboard');

        $response->assertStatus(403);
    }
}
