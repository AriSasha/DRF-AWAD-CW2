@extends('layouts.main')

@section('title', 'Courses')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Start: Page heading -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-xl font-semibold">Courses</h1>
            <p class="text-sm text-slate-500 mt-1">All courses offered this semester.</p>
        </div>
        @can('manage courses')
            <a href="{{ route('courses.create') }}" class="px-4 py-2 bg-[#7b1e2b] rounded-lg text-sm font-medium text-white hover:bg-[#5f1621]">Add course</a>
        @endcan
    </div>
    <!-- End: Page heading -->

    <!-- Start: Courses table -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <table class="w-full">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Code</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course name</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Lecturer</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Students</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr class="border-b border-slate-200 hover:bg-slate-50">
                    <td class="py-3 px-4 text-sm font-medium">{{ $course->code }}</td>
                    <td class="py-3 px-4 text-sm">{{ $course->name }}</td>
                    <td class="py-3 px-4 text-sm text-slate-500">{{ $course->lecturer->name ?? 'Not assigned' }}</td>
                    <td class="py-3 px-4 text-sm">{{ $course->students->count() }}</td>
                    <td class="py-3 px-4 text-sm">
                        @unlessrole('student')
                            <a href="{{ route('courses.show', $course->id) }}" class="text-[#7b1e2b] font-medium">View</a>
                        @endunlessrole
                        @can('manage courses')
                            <a href="{{ route('courses.edit', $course->id) }}" class="text-[#7b1e2b] font-medium ml-3">Edit</a>
                            <form method="POST" action="{{ route('courses.destroy', $course->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-medium ml-3">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- End: Courses table -->

</div>
@endsection
