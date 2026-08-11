<?php

use App\Models\Doctor;
use App\Models\User;

it('allows an admin to view the doctor edit page', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $doctor = Doctor::factory()->create();

    $response = $this->actingAs($admin)->get(route('admin.doctors.edit', $doctor));

    $response->assertStatus(200);
    $response->assertSee('Update doctor profile');
});
