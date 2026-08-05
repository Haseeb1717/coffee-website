<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_exposes_dynamic_dashboard_data(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::factory()->count(3)->create([
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($admin);

        $response = $this->get('/admin/dashboard');

        $response->assertOk();
        $response->assertViewHas('userName', 'Admin User');
        $response->assertViewHas('customerCount', 3);
        $response->assertViewHas('metrics');
    }
}
