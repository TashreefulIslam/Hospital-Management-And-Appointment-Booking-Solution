<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a user can register and is assigned the user role', function () {
    $response = $this->post('/register', [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '01700000000',
        'address' => 'Dhaka',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertRedirect('/dashboard');
    $this->assertDatabaseHas('users', [
        'email' => 'jane@example.com',
        'role' => 'user',
    ]);
});

test('an admin can access the admin dashboard', function () {
    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $this->actingAs($admin)->get('/admin')->assertOk();
});

test('a regular user cannot access the admin dashboard', function () {
    $user = User::factory()->create([
        'role' => 'user',
    ]);

    $this->actingAs($user)->get('/admin')->assertRedirect('/dashboard');
});
