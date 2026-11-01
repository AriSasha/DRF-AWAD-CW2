@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <h1 class="text-xl font-semibold mb-6">Welcome, {{ auth()->user()->name }}</h1>

    {{-- Admin: totals --}}
    @role('admin')
    <div class="grid sm:grid-cols-3 gap-4">
        <a href="{{ route('students.index') }}" class="bg-white border border-slate-200 rounded-xl p-5">
            <p class="text-sm text-slate-500">Students</p>
            <p class="text-2xl font-bold text-[#7b1e2b]">{{ $studentCount }}</p>
        </a>
        <a href="{{ route('courses.index') }}" class="bg-white border border-slate-200 rounded-xl p-5">
            <p class="text-sm text-slate-500">Courses</p>
            <p class="text-2xl font-bold text-[#7b1e2b]">{{ $courseCount }}</p>
        </a>
        <a href="{{ route('registrations.index') }}" class="bg-white border border-slate-200 rounded-xl p-5">
            <p class="text-sm text-slate-500">Registrations</p>
            <p class="text-2xl font-bold text-[#7b1e2b]">{{ $registrationCount }}</p>
        </a>
    </div>
    @endrole

    {{-- Lecturer: the courses they teach --}}
    @role('lecturer')
    <h2 class="font-semibold mb-3">My courses</h2>
    <div class="bg-white border border-slate-200 rounded-xl divide-y divide-slate-200">
        @foreach (auth()->user()->courses as $course)
            <a href="{{ route('courses.show', $course->id) }}" class="flex justify-between p-4 text-sm">
                <span>{{ $course->code }} — {{ $course->name }}</span>
                <span class="text-slate-500">{{ $course->students->count() }} students</span>
            </a>
        @endforeach
    </div>
    @endrole

    {{-- Student: the courses they registered for --}}
    @role('student')
    <h2 class="font-semibold mb-3">My registered courses</h2>
    <div class="bg-white border border-slate-200 rounded-xl divide-y divide-slate-200">
        @foreach (auth()->user()->student->courses as $course)
            <p class="p-4 text-sm">{{ $course->code }} — {{ $course->name }}</p>
        @endforeach
    </div>
    <a href="{{ route('registrations.create') }}" class="inline-block mt-4 px-4 py-2 bg-[#7b1e2b] rounded-lg text-sm font-medium text-white hover:bg-[#5f1621]">Register for a course</a>
    @endrole

</div>
@endsection
