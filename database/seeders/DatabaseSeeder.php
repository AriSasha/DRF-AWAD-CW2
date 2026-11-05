<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // the order matters: roles first, then users, then courses and students, then registrations
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            CourseSeeder::class,
            StudentSeeder::class,
            RegistrationSeeder::class,
        ]);
    }
}
