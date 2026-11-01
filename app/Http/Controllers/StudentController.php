<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'reg_no' => 'required|unique:students,reg_no',
            'email' => 'required|email|unique:users,email',
            'program' => 'required',
        ]);

        // 1. create the login account (default password: password) and give it the student role
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('student');

        // 2. create the student record linked to that account
        $data['user_id'] = $user->id;
        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student added.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required',
            'reg_no' => 'required|unique:students,reg_no,' . $student->id,
            'email' => 'required|email|unique:users,email,' . $student->user_id,
            'program' => 'required',
        ]);

        $student->update($data);

        // keep the login account's name and email the same as the student record
        $student->user->update(['name' => $data['name'], 'email' => $data['email']]);

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        // deleting the account also deletes the student and their registrations (cascade)
        $student->user->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}
