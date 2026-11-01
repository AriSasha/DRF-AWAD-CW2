<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            // admins see every registration
            $registrations = Registration::all();
        } elseif ($user->hasRole('lecturer')) {
            // lecturers see registrations for the courses they teach
            $courseIds = $user->courses->pluck('id');
            $registrations = Registration::whereIn('course_id', $courseIds)->get();
        } else {
            // students see only their own registrations
            $registrations = Registration::where('student_id', $user->student->id)->get();
        }

        return view('registrations.index', compact('registrations'));
    }

    public function show(Registration $registration)
    {
        $user = Auth::user();

        // students can only open their own registrations
        if ($user->hasRole('student') && $registration->student_id != $user->student->id) {
            abort(403);
        }

        // lecturers can only open registrations for their own courses
        if ($user->hasRole('lecturer') && $registration->course->lecturer_id != $user->id) {
            abort(403);
        }

        return view('registrations.show', compact('registration'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();

        return view('registrations.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // admins choose the student; a student registers themselves
        if ($user->hasRole('admin')) {
            $request->validate([
                'student_id' => 'required|exists:students,id',
            ]);
            $studentId = $request->student_id;
        } else {
            $studentId = $user->student->id;
        }

        // stop duplicate registrations
        $alreadyRegistered = Registration::where('student_id', $studentId)
            ->where('course_id', $request->course_id)
            ->exists();

        if ($alreadyRegistered) {
            return back()->with('error', 'This student is already registered for that course.');
        }

        Registration::create([
            'student_id' => $studentId,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Registration saved.');
    }

    public function edit(Registration $registration)
    {
        $students = Student::all();
        $courses = Course::all();

        return view('registrations.edit', compact('registration', 'students', 'courses'));
    }

    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        // stop duplicates, but ignore this same registration
        $alreadyRegistered = Registration::where('student_id', $request->student_id)
            ->where('course_id', $request->course_id)
            ->where('id', '!=', $registration->id)
            ->exists();

        if ($alreadyRegistered) {
            return back()->with('error', 'This student is already registered for that course.');
        }

        $registration->update([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Registration updated.');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()->route('registrations.index')->with('success', 'Registration deleted.');
    }
}
