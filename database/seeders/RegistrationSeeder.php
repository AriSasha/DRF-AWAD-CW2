<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $priscillar = Student::where('reg_no', '23/U/1234/EVE')->first();
        $kautharah = Student::where('reg_no', '24/U/18757/EVE')->first();
        $jude = Student::where('reg_no', '24/U/0395/EVE')->first();

        $web = Course::where('code', 'BUC3131')->first();
        $database = Course::where('code', 'BIT2105')->first();

        // firstOrCreate checks the student and course pair first, so no duplicate registrations
        Registration::firstOrCreate(['student_id' => $priscillar->id, 'course_id' => $web->id]);
        Registration::firstOrCreate(['student_id' => $priscillar->id, 'course_id' => $database->id]);
        Registration::firstOrCreate(['student_id' => $kautharah->id, 'course_id' => $web->id]);
        Registration::firstOrCreate(['student_id' => $jude->id, 'course_id' => $database->id]);
    }
}
