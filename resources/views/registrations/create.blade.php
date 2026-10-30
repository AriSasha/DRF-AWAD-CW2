@extends('layouts.main')

@section('title', 'Register for a course')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <h1 class="text-xl font-semibold mb-6">Register for a course</h1>

    <!-- Start: Registration form -->
    <form method="POST" action="{{ url('/registrations') }}" class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm max-w-2xl">
        @csrf
        <div class="p-6 space-y-5">
            @can('manage registrations')
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Student</label>
                <select class="input-field" name="student_id">
                    <option value="">Choose a student</option>
                    <option value="1">Aisha Namuli (24/U/01001/PS)</option>
                    <option value="2">Brian Kato (24/U/01002/PS)</option>
                    <option value="3">Catherine Achieng (24/U/01003/PS)</option>
                </select>
                @error('student_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            @endcan
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Course</label>
                <select class="input-field" name="course_id">
                    <option value="">Choose a course</option>
                    <option value="1">BUC3131 — Advanced Web Application Development</option>
                    <option value="2">BUC3126 — Information Security and Auditing</option>
                    <option value="3">BUC3110 — Mobile Application Development</option>
                    <option value="4">BUC3105 — Database Management Systems</option>
                </select>
                @error('course_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="px-4 py-4 border-t border-slate-200 flex justify-between">
            <a href="{{ url('/registrations') }}" class="px-4 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-100">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-[#7b1e2b] rounded-lg text-sm font-medium text-white hover:bg-[#5f1621]">Register</button>
        </div>
    </form>
    <!-- End: Registration form -->

</div>
@endsection
