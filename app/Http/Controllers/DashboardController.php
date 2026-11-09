<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        // totals for the admin; lecturers and students see their own lists in the view
        return view('dashboard', [
            'studentCount' => Student::count(),
            'courseCount' => Course::count(),
            'registrationCount' => Registration::count(),
        ]);
    }
}
