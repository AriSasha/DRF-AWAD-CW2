@extends('layouts.main')

@section('title', 'Course')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <a href="{{ route('courses.index') }}" class="text-sm text-[#ECC412] font-medium">← Back to courses</a>

    <h1 class="text-xl font-semibold mt-4">{{ $course->code }} — {{ $course->name }}</h1>
    <p class="text-sm text-[#B9AC9B] mt-1 mb-6">Lecturer: {{ $course->lecturer->name ?? 'Not assigned' }}</p>

    <!-- Start: Registered students -->
    <h2 class="font-semibold mb-3">Registered students ({{ $course->students->count() }})</h2>
    <div class="bg-[#1A1A1A] border border-[#333333] rounded-xl overflow-hidden shadow-sm">
        <table class="w-full">
            <thead>
                <tr class="border-b border-[#333333] bg-[#141414]">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Reg No</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Name</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Program</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->students as $student)
                <tr class="border-b border-[#333333]">
                    <td class="py-3 px-4 text-sm font-medium">{{ $student->reg_no }}</td>
                    <td class="py-3 px-4 text-sm">{{ $student->name }}</td>
                    <td class="py-3 px-4 text-sm text-[#B9AC9B]">{{ $student->email }}</td>
                    <td class="py-3 px-4 text-sm">{{ $student->program }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- End: Registered students -->

</div>
@endsection
