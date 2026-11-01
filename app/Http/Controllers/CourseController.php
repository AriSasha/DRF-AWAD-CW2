<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // lecturers only see the courses they teach; admins and students see all courses
        if ($user->hasRole('lecturer')) {
            $courses = Course::where('lecturer_id', $user->id)->get();
        } else {
            $courses = Course::all();
        }

        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $user = Auth::user();

        // students cannot see the list of other students in a course
        if ($user->hasRole('student')) {
            abort(403);
        }

        // a lecturer can only open their own course
        if ($user->hasRole('lecturer') && $course->lecturer_id != $user->id) {
            abort(403);
        }

        return view('courses.show', compact('course'));
    }

    public function create()
    {
        $lecturers = User::role('lecturer')->get();

        return view('courses.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|unique:courses,code',
            'name' => 'required',
            'lecturer_id' => 'nullable|exists:users,id',
            'description' => 'nullable',
        ]);

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Course added.');
    }

    public function edit(Course $course)
    {
        $lecturers = User::role('lecturer')->get();

        return view('courses.edit', compact('course', 'lecturers'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'code' => 'required|unique:courses,code,' . $course->id,
            'name' => 'required',
            'lecturer_id' => 'nullable|exists:users,id',
            'description' => 'nullable',
        ]);

        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'Course updated.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }
}
