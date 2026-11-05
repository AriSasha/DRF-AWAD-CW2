<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $lecturer1 = User::where('email', 'bmutebi@mubs.ac.ug')->first();
        $lecturer2 = User::where('email', 'jdoe@mubs.ac.ug')->first();

        // firstOrCreate checks the course code first, so no duplicate courses
        Course::firstOrCreate(
            ['code' => 'BUC3131'],
            ['name' => 'Advanced Web Application Development', 'description' => 'Building web applications with Laravel.', 'lecturer_id' => $lecturer1->id]
        );

        Course::firstOrCreate(
            ['code' => 'BIT2105'],
            ['name' => 'Database Management Systems', 'description' => 'Relational database design, SQL querying, and normalization.', 'lecturer_id' => $lecturer2->id]
        );

        Course::firstOrCreate(
            ['code' => 'BUC3124'],
            ['name' => 'Web App Development', 'description' => 'Developing websites.', 'lecturer_id' => $lecturer1->id]
        );

        Course::firstOrCreate(
            ['code' => 'BUC3458'],
            ['name' => 'Business Application Programming', 'description' => 'Developing applications.', 'lecturer_id' => $lecturer2->id]
        );
    }
}
