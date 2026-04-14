<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Patient>
 */
class PatientFactory extends Factory
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
        'birth_date' => fake()->date(),
        'gender' => fake()->randomElement(['Male', 'Female']),
        'contact_number' => fake()->phoneNumber(),
        'address' => fake()->address(),
        // Assign to a random doctor and user already in the DB
        'doctor_id' => \App\Models\Doctor::inRandomOrder()->first()->id ?? \App\Models\Doctor::factory(),
        'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? \App\Models\User::factory(),
    ];
    }
}
