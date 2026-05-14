<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin
        \App\Models\User::create([
            'name' => 'Clinic Admin',
            'email' => 'admin@clinic.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create a test Student
        \App\Models\User::create([
            'name' => 'John Student',
            'email' => 'student@clinic.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'student',
        ]);

        // Create some demo medicines
        \App\Models\Medicine::create([
            'name' => 'Paracetamol',
            'stock' => 50,
            'unit' => 'pcs',
            'low_stock_threshold' => 10,
        ]);

        \App\Models\Medicine::create([
            'name' => 'Amoxicillin',
            'stock' => 5,
            'unit' => 'bottles',
            'low_stock_threshold' => 10,
        ]);
    }
}
