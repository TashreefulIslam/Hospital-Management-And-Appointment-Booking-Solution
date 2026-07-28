<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Doctor> */
class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'designation' => 'Cardiologist',
            'short_bio' => $this->faker->sentence(),
            'status' => 'active',
            'availability' => ['Monday 09:00', 'Wednesday 14:00'],
        ];
    }
}
