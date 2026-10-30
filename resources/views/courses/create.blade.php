@extends('layouts.main')

@section('title', 'Add course')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <h1 class="text-xl font-semibold mb-6">Add course</h1>

    <!-- Start: Course form -->
    <form method="POST" action="{{ url('/courses') }}" class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm max-w-2xl">
        @csrf
        <div class="p-6 space-y-5">
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Course code</label>
                <input class="input-field" name="code" value="{{ old('code') }}" placeholder="e.g. BUC3131">
                @error('code') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Course name</label>
                <input class="input-field" name="name" value="{{ old('name') }}" placeholder="e.g. Advanced Web Application Development">
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Lecturer</label>
                <select class="input-field" name="lecturer_id">
                    <option value="">Choose a lecturer</option>
                    <option value="1">Daniel Okello</option>
                    <option value="2">Grace Nakato</option>
                    <option value="3">Peter Mugisha</option>
                </select>
                @error('lecturer_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Description</label>
                <textarea class="input-field" name="description" rows="4" placeholder="What the course covers">{{ old('description') }}</textarea>
                @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="px-4 py-4 border-t border-slate-200 flex justify-between">
            <a href="{{ url('/courses') }}" class="px-4 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-100">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-[#7b1e2b] rounded-lg text-sm font-medium text-white hover:bg-[#5f1621]">Save course</button>
        </div>
    </form>
    <!-- End: Course form -->

</div>
@endsection
