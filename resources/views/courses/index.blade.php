@extends('layouts.main')

@section('title', 'Courses')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Start: Page heading -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-xl font-semibold">Courses</h1>
            <p class="text-sm text-[#B9AC9B] mt-1">All courses offered this semester.</p>
        </div>
        @can('manage courses')
            <a href="{{ route('courses.create') }}" class="px-4 py-2 bg-[#ECC412] rounded-lg text-sm font-medium text-[#0F0F0F] hover:bg-[#F5D54A]">Add course</a>
        @endcan
    </div>
    <!-- End: Page heading -->

    <!-- Start: Courses table -->
    <div class="bg-[#1A1A1A] border border-[#333333] rounded-xl overflow-hidden shadow-sm">
        <table class="w-full">
            <thead>
                <tr class="border-b border-[#333333] bg-[#141414]">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Code</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Course name</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Lecturer</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Students</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr class="border-b border-[#333333] hover:bg-[#262626]">
                    <td class="py-3 px-4 text-sm font-medium">{{ $course->code }}</td>
                    <td class="py-3 px-4 text-sm">{{ $course->name }}</td>
                    <td class="py-3 px-4 text-sm text-[#B9AC9B]">{{ $course->lecturer->name ?? 'Not assigned' }}</td>
                    <td class="py-3 px-4 text-sm">{{ $course->students->count() }}</td>
                    <td class="py-3 px-4 text-sm">
                        @unlessrole('student')
                            <a href="{{ route('courses.show', $course->id) }}" class="text-[#ECC412] font-medium">View</a>
                        @endunlessrole
                        @can('manage courses')
                            <a href="{{ route('courses.edit', $course->id) }}" class="text-[#ECC412] font-medium ml-3">Edit</a>
                            <form method="POST" action="{{ route('courses.destroy', $course->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-3 px-2 py-0.5 rounded bg-[#B0232B] text-white font-medium hover:bg-[#8F1C23]">Delete</button>
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
