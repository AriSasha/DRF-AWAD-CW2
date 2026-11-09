@extends('layouts.main')

@section('title', 'Edit student')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <h1 class="text-xl font-semibold mb-6">Edit student</h1>

    <!-- Start: Student form -->
    <form method="POST" action="{{ route('students.update', $student->id) }}" class="bg-[#1A1A1A] border border-[#333333] rounded-xl overflow-hidden shadow-sm max-w-2xl">
        @csrf
        @method('PUT')
        <div class="p-6 space-y-5">
            <div>
                <label class="block text-sm font-medium text-[#D6C7B4] mb-2">Full name</label>
                <input class="input-field" name="name" value="{{ $student->name }}" placeholder="e.g. Aisha Namuli">
                @error('name') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-[#D6C7B4] mb-2">Registration number</label>
                <input class="input-field" name="reg_no" value="{{ $student->reg_no }}" placeholder="e.g. 24/U/01001/PS">
                @error('reg_no') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-[#D6C7B4] mb-2">Email</label>
                <input type="email" class="input-field" name="email" value="{{ $student->email }}" placeholder="e.g. aisha.namuli@mubs.ac.ug">
                @error('email') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-[#D6C7B4] mb-2">Program</label>
                <input class="input-field" name="program" value="{{ $student->program }}" placeholder="e.g. Bachelor of Business Computing">
                @error('program') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="px-4 py-4 border-t border-[#333333] flex justify-between">
            <a href="{{ route('students.index') }}" class="px-4 py-2 border border-[#333333] rounded-lg text-sm text-[#D6C7B4] hover:bg-[#262626]">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-[#ECC412] rounded-lg text-sm font-medium text-[#0F0F0F] hover:bg-[#F5D54A]">Update student</button>
        </div>
    </form>
    <!-- End: Student form -->

</div>
@endsection
