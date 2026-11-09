@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <h1 class="text-xl font-semibold mb-6">Welcome, {{ auth()->user()->name }}</h1>

    {{-- Admin: totals --}}
    @role('admin')
    <div class="grid sm:grid-cols-3 gap-4">
        <a href="{{ route('students.index') }}" class="bg-[#1A1A1A] border border-[#333333] border-t-4 border-t-[#B0232B] rounded-xl p-5 hover:bg-[#262626]">
            <p class="text-sm text-[#B9AC9B]">Students</p>
            <p class="text-2xl font-bold text-[#ECC412]">{{ $studentCount }}</p>
        </a>
        <a href="{{ route('courses.index') }}" class="bg-[#1A1A1A] border border-[#333333] border-t-4 border-t-[#ECC412] rounded-xl p-5 hover:bg-[#262626]">
            <p class="text-sm text-[#B9AC9B]">Courses</p>
            <p class="text-2xl font-bold text-[#ECC412]">{{ $courseCount }}</p>
        </a>
        <a href="{{ route('registrations.index') }}" class="bg-[#1A1A1A] border border-[#333333] border-t-4 border-t-[#1C7F46] rounded-xl p-5 hover:bg-[#262626]">
            <p class="text-sm text-[#B9AC9B]">Registrations</p>
            <p class="text-2xl font-bold text-[#ECC412]">{{ $registrationCount }}</p>
        </a>
    </div>
    @endrole

    {{-- Lecturer: the courses they teach --}}
    @role('lecturer')
    <h2 class="font-semibold mb-3">My courses</h2>
    <div class="bg-[#1A1A1A] border border-[#333333] rounded-xl divide-y divide-[#333333]">
        @foreach (auth()->user()->courses as $course)
            <a href="{{ route('courses.show', $course->id) }}" class="flex justify-between p-4 text-sm">
                <span>{{ $course->code }} — {{ $course->name }}</span>
                <span class="text-[#B9AC9B]">{{ $course->students->count() }} students</span>
            </a>
        @endforeach
    </div>
    @endrole

    {{-- Student: the courses they registered for --}}
    @role('student')
    <h2 class="font-semibold mb-3">My registered courses</h2>
    <div class="bg-[#1A1A1A] border border-[#333333] rounded-xl divide-y divide-[#333333]">
        @foreach (auth()->user()->student->courses as $course)
            <p class="p-4 text-sm">{{ $course->code }} — {{ $course->name }}</p>
        @endforeach
    </div>
    <a href="{{ route('registrations.create') }}" class="inline-block mt-4 px-4 py-2 bg-[#ECC412] rounded-lg text-sm font-medium text-[#0F0F0F] hover:bg-[#F5D54A]">Register for a course</a>
    @endrole

</div>
@endsection
