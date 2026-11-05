<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['reg_no' => '23/U/1234/EVE', 'name' => 'Priscillar Nakabugo', 'email' => 'priscillar@mubs.ac.ug'],
            ['reg_no' => '24/U/18757/EVE', 'name' => 'Namusobya Kautharah', 'email' => 'kautharah@mubs.ac.ug'],
            ['reg_no' => '24/U/0395/EVE', 'name' => 'Ganda Jude', 'email' => 'jude@mubs.ac.ug'],
            ['reg_no' => '24/U/16323/EVE', 'name' => 'Kyagulanyi Maurice', 'email' => 'maurice@mubs.ac.ug'],
            ['reg_no' => '24/U/18976/EVE', 'name' => 'Mutesi Suzan', 'email' => 'suzan@mubs.ac.ug'],
        ];

        foreach ($students as $data) {
            // 1. the login account, with the student role
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                ['name' => $data['name'], 'password' => Hash::make('password')]
            );
            $user->assignRole('student');

            // 2. the student record, linked to that account
            Student::firstOrCreate(
                ['reg_no' => $data['reg_no']],
                [
                    'user_id' => $user->id,
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'program' => 'Bachelor of Business Computing',
                ]
            );
        }
    }
}
