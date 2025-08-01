<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ApiUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_index_returns_paginated_users()
    {
        User::factory()->count(5)->create();
        $response = $this->getJson('/api/users');
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }

    public function test_user_show_returns_user()
    {
        $user = User::factory()->create();
        $response = $this->getJson('/api/users/'.$user->id);
        $response->assertStatus(200)->assertJson(['data' => ['id' => $user->id]]);
    }

    public function test_user_store_creates_user()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'secret123',
        ];
        $response = $this->postJson('/api/users', $data);
        $response->assertStatus(200)->assertJson(['data' => ['email' => 'test@example.com']]);
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

    public function test_user_update_modifies_user()
    {
        $user = User::factory()->create();
        $response = $this->putJson('/api/users/'.$user->id, ['name' => 'Nuevo Nombre']);
        $response->assertStatus(200)->assertJson(['data' => ['name' => 'Nuevo Nombre']]);
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Nuevo Nombre']);
    }

    public function test_user_destroy_deletes_user()
    {
        $user = User::factory()->create();
        $response = $this->deleteJson('/api/users/'.$user->id);
        $response->assertStatus(200)->assertJson(['message' => 'Usuario eliminado']);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
} 