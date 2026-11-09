@extends('layouts.main')

@section('title', 'Add course')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <h1 class="text-xl font-semibold mb-6">Add course</h1>

    <!-- Start: Course form -->
    <form method="POST" action="{{ route('courses.store') }}" class="bg-[#1A1A1A] border border-[#333333] rounded-xl overflow-hidden shadow-sm max-w-2xl">
        @csrf
        <div class="p-6 space-y-5">
            <div>
                <label class="block text-sm font-medium text-[#D6C7B4] mb-2">Course code</label>
                <input class="input-field" name="code" placeholder="e.g. BUC3131">
                @error('code') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-[#D6C7B4] mb-2">Course name</label>
                <input class="input-field" name="name" placeholder="e.g. Advanced Web Application Development">
                @error('name') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-[#D6C7B4] mb-2">Lecturer</label>
                <select class="input-field" name="lecturer_id">
                    <option value="">Choose a lecturer</option>
                    @foreach ($lecturers as $lecturer)
                        <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                    @endforeach
                </select>
                @error('lecturer_id') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-[#D6C7B4] mb-2">Description</label>
                <textarea class="input-field" name="description" rows="4" placeholder="What the course covers"></textarea>
                @error('description') <p class="text-sm text-[#F28B8F] mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="px-4 py-4 border-t border-[#333333] flex justify-between">
            <a href="{{ route('courses.index') }}" class="px-4 py-2 border border-[#333333] rounded-lg text-sm text-[#D6C7B4] hover:bg-[#262626]">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-[#ECC412] rounded-lg text-sm font-medium text-[#0F0F0F] hover:bg-[#F5D54A]">Save course</button>
        </div>
    </form>
    <!-- End: Course form -->

</div>
@endsection
