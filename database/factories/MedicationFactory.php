<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Random common medicine names
            'name' => fake()->randomElement([
                'Paracetamol', 'Ibuprofen', 'Amoxicillin', 'Metformin', 
                'Lisinopril', 'Amlodipine', 'Atorvastatin', 'Omeprazole', 
                'Azithromycin', 'Losartan', 'Albuterol', 'Gabapentin'
            ]) . ' ' . fake()->word(), 
            
            // Random dosage
            'dosage' => fake()->randomElement(['250mg', '500mg', '10mg', '20mg', '5ml', '100mcg']),
            
            // Random description
            'description' => fake()->sentence(10),
        ];
    }
}