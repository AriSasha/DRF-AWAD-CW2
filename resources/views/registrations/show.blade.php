@extends('layouts.main')

@section('title', 'Registration details')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <a href="{{ route('registrations.index') }}" class="text-sm text-[#ECC412] font-medium">← Back to registrations</a>

    <h1 class="text-xl font-semibold mt-4 mb-6">Registration details</h1>

    <!-- Start: Registration details -->
    <div class="bg-[#1A1A1A] border border-[#333333] rounded-xl shadow-sm max-w-2xl divide-y divide-[#333333]">
        <div class="flex justify-between p-4"><span class="text-sm text-[#B9AC9B]">Student</span><span class="text-sm font-medium">{{ $registration->student->name }}</span></div>
        <div class="flex justify-between p-4"><span class="text-sm text-[#B9AC9B]">Reg No</span><span class="text-sm font-medium">{{ $registration->student->reg_no }}</span></div>
        <div class="flex justify-between p-4"><span class="text-sm text-[#B9AC9B]">Course</span><span class="text-sm font-medium">{{ $registration->course->code }} — {{ $registration->course->name }}</span></div>
        <div class="flex justify-between p-4"><span class="text-sm text-[#B9AC9B]">Lecturer</span><span class="text-sm font-medium">{{ $registration->course->lecturer->name ?? 'Not assigned' }}</span></div>
        <div class="flex justify-between p-4"><span class="text-sm text-[#B9AC9B]">Date registered</span><span class="text-sm font-medium">{{ $registration->created_at->format('M d, Y') }}</span></div>
    </div>
    <!-- End: Registration details -->

    @can('manage registrations')
        <a href="{{ route('registrations.edit', $registration->id) }}" class="inline-block mt-4 px-4 py-2 border border-[#333333] rounded-lg text-sm text-[#D6C7B4] hover:bg-[#262626]">Edit</a>
    @endcan

</div>
@endsection
