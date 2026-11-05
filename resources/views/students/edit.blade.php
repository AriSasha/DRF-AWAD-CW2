@extends('layouts.main')

@section('title', 'Edit student')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <h1 class="text-xl font-semibold mb-6">Edit student</h1>

    <!-- Start: Student form -->
    <form method="POST" action="{{ route('students.update', $student->id) }}" class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm max-w-2xl">
        @csrf
        @method('PUT')
        <div class="p-6 space-y-5">
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Full name</label>
                <input class="input-field" name="name" value="{{ $student->name }}" placeholder="e.g. Aisha Namuli">
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Registration number</label>
                <input class="input-field" name="reg_no" value="{{ $student->reg_no }}" placeholder="e.g. 24/U/01001/PS">
                @error('reg_no') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Email</label>
                <input type="email" class="input-field" name="email" value="{{ $student->email }}" placeholder="e.g. aisha.namuli@mubs.ac.ug">
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Program</label>
                <input class="input-field" name="program" value="{{ $student->program }}" placeholder="e.g. Bachelor of Business Computing">
                @error('program') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="px-4 py-4 border-t border-slate-200 flex justify-between">
            <a href="{{ route('students.index') }}" class="px-4 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-100">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-[#7b1e2b] rounded-lg text-sm font-medium text-white hover:bg-[#5f1621]">Update student</button>
        </div>
    </form>
    <!-- End: Student form -->

</div>
@endsection
