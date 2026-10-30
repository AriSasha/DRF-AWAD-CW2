@extends('layouts.main')

@section('title', 'Registration details')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <a href="{{ url('/registrations') }}" class="text-sm text-[#7b1e2b] font-medium">← Back to registrations</a>

    <h1 class="text-xl font-semibold mt-4 mb-6">Registration details</h1>

    <!-- Start: Registration details -->
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm max-w-2xl">
        <dl class="divide-y divide-slate-200">
            <div class="flex justify-between p-4"><dt class="text-sm text-slate-500">Student</dt><dd class="text-sm font-medium">Aisha Namuli</dd></div>
            <div class="flex justify-between p-4"><dt class="text-sm text-slate-500">Reg No</dt><dd class="text-sm font-medium">24/U/01001/PS</dd></div>
            <div class="flex justify-between p-4"><dt class="text-sm text-slate-500">Course</dt><dd class="text-sm font-medium">BUC3131 — Advanced Web Application Development</dd></div>
            <div class="flex justify-between p-4"><dt class="text-sm text-slate-500">Lecturer</dt><dd class="text-sm font-medium">Daniel Okello</dd></div>
            <div class="flex justify-between p-4"><dt class="text-sm text-slate-500">Date registered</dt><dd class="text-sm font-medium">Aug 18, 2026</dd></div>
        </dl>

        @can('manage registrations')
        <div class="px-4 py-4 border-t border-slate-200 flex justify-between">
            <a href="{{ url('/registrations/1/edit') }}" class="px-4 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-100">Edit</a>
            <form method="POST" action="{{ url('/registrations/1') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 rounded-lg text-sm font-medium text-white hover:bg-red-700">Delete registration</button>
            </form>
        </div>
        @endcan
    </div>
    <!-- End: Registration details -->

</div>
@endsection
