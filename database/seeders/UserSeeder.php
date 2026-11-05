<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // firstOrCreate only creates the user if that email is not already in the table,
        // so running the seeder again does not make duplicates

        // Admin account
        $admin = User::firstOrCreate(
            ['email' => 'admin@mubs.ac.ug'],
            ['name' => 'System Admin', 'password' => Hash::make('password')]
        );
        $admin->assignRole('admin');

        // Lecturer accounts
        $lecturer1 = User::firstOrCreate(
            ['email' => 'bmutebi@mubs.ac.ug'],
            ['name' => 'Mr. Mutebi Bashir', 'password' => Hash::make('password')]
        );
        $lecturer1->assignRole('lecturer');

        $lecturer2 = User::firstOrCreate(
            ['email' => 'jdoe@mubs.ac.ug'],
            ['name' => 'Dr. Jane Doe', 'password' => Hash::make('password')]
        );
        $lecturer2->assignRole('lecturer');
    }
}
