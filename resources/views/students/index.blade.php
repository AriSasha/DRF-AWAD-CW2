@extends('layouts.main')

@section('title', 'Students')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Start: Page heading -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-xl font-semibold">Students</h1>
            <p class="text-sm text-[#B9AC9B] mt-1">All students in the system.</p>
        </div>
        @can('manage students')
            <a href="{{ route('students.create') }}" class="px-4 py-2 bg-[#ECC412] rounded-lg text-sm font-medium text-[#0F0F0F] hover:bg-[#F5D54A]">Add student</a>
        @endcan
    </div>
    <!-- End: Page heading -->

    <!-- Start: Students table -->
    <div class="bg-[#1A1A1A] border border-[#333333] rounded-xl overflow-hidden shadow-sm">
        <table class="w-full">
            <thead>
                <tr class="border-b border-[#333333] bg-[#141414]">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Reg No</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Name</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Program</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Courses</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="border-b border-[#333333] hover:bg-[#262626]">
                    <td class="py-3 px-4 text-sm font-medium">{{ $student->reg_no }}</td>
                    <td class="py-3 px-4 text-sm">{{ $student->name }}</td>
                    <td class="py-3 px-4 text-sm text-[#B9AC9B]">{{ $student->email }}</td>
                    <td class="py-3 px-4 text-sm">{{ $student->program }}</td>
                    <td class="py-3 px-4 text-sm">{{ $student->courses->count() }}</td>
                    <td class="py-3 px-4 text-sm">
                        @can('manage students')
                            <a href="{{ route('students.edit', $student->id) }}" class="text-[#ECC412] font-medium">Edit</a>
                            <form method="POST" action="{{ route('students.destroy', $student->id) }}" class="inline">
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
    <!-- End: Students table -->

</div>
@endsection
