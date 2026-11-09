@extends('layouts.main')

@section('title', 'Edit registration')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <h1 class="text-xl font-semibold mb-6">Edit registration</h1>

    <!-- Start: Registration form -->
    <form method="POST" action="{{ route('registrations.update', $registration->id) }}" class="bg-[#1A1A1A] border border-[#333333] rounded-xl overflow-hidden shadow-sm max-w-2xl">
        @csrf
        @method('PUT')
        <div class="p-6 space-y-5">
            {{-- only admins choose the student; students register themselves --}}
            @can('manage registrations')
            <div>
                <label class="block text-sm font-medium text-[#D6C7B4] mb-2">Student</label>
                <select class="input-field" name="student_id">
                    <option value="">Choose a student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" @selected($registration->student_id == $student->id)>{{ $student->name }} ({{ $student->reg_no }})</option>
                    @endforeach
                </select>
                @error('student_id') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
            @endcan
            <div>
                <label class="block text-sm font-medium text-[#D6C7B4] mb-2">Course</label>
                <select class="input-field" name="course_id">
                    <option value="">Choose a course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" @selected($registration->course_id == $course->id)>{{ $course->code }} — {{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="px-4 py-4 border-t border-[#333333] flex justify-between">
            <a href="{{ route('registrations.index') }}" class="px-4 py-2 border border-[#333333] rounded-lg text-sm text-[#D6C7B4] hover:bg-[#262626]">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-[#ECC412] rounded-lg text-sm font-medium text-[#0F0F0F] hover:bg-[#F5D54A]">Update registration</button>
        </div>
    </form>
    <!-- End: Registration form -->

</div>
@endsection
