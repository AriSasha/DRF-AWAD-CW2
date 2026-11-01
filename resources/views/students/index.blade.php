@extends('layouts.main')

@section('title', 'Students')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Start: Page heading -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-xl font-semibold">Students</h1>
            <p class="text-sm text-slate-500 mt-1">All students in the system.</p>
        </div>
        @can('manage students')
            <a href="{{ route('students.create') }}" class="px-4 py-2 bg-[#7b1e2b] rounded-lg text-sm font-medium text-white hover:bg-[#5f1621]">Add student</a>
        @endcan
    </div>
    <!-- End: Page heading -->

    <!-- Start: Students table -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <table class="w-full">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Reg No</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Name</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Program</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Courses</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="border-b border-slate-200 hover:bg-slate-50">
                    <td class="py-3 px-4 text-sm font-medium">{{ $student->reg_no }}</td>
                    <td class="py-3 px-4 text-sm">{{ $student->name }}</td>
                    <td class="py-3 px-4 text-sm text-slate-500">{{ $student->email }}</td>
                    <td class="py-3 px-4 text-sm">{{ $student->program }}</td>
                    <td class="py-3 px-4 text-sm">{{ $student->courses->count() }}</td>
                    <td class="py-3 px-4 text-sm">
                        @can('manage students')
                            <a href="{{ route('students.edit', $student->id) }}" class="text-[#7b1e2b] font-medium">Edit</a>
                            <form method="POST" action="{{ route('students.destroy', $student->id) }}" class="inline">
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
    <!-- End: Students table -->

</div>
@endsection
