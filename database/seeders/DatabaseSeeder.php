<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Medication;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create the Admin
        $admin = User::create([
            'name' => 'Admin Account',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Create a Regular User
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // 3. Create 10 Doctors
        Doctor::factory(10)->create();

        // 4. Create Patients for Admin and User
        Patient::factory(5)->create(['user_id' => $admin->id]);
        Patient::factory(5)->create(['user_id' => $user->id]);

        // 5. Create 10 Medications
        Medication::factory(10)->create();

        $this->command->info('Database fully seeded with all data!');
    }
}