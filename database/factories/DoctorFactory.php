<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'specialization' => fake()->randomElement(['Cardiology', 'Pediatrics', 'Neurology', 'General Surgery', 'Dermatology']),
        'contact_number' => fake()->phoneNumber(),
        'email' => fake()->unique()->safeEmail(),
    ];
    }
}
