@extends('layouts.main')

@section('title', 'Registrations')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Start: Page heading -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-xl font-semibold">Course registrations</h1>
            <p class="text-sm text-slate-500 mt-1">Which students are registered for which courses.</p>
        </div>
        @canany(['manage registrations', 'register for courses'])
            <a href="{{ route('registrations.create') }}" class="px-4 py-2 bg-[#7b1e2b] rounded-lg text-sm font-medium text-white hover:bg-[#5f1621]">Register for a course</a>
        @endcanany
    </div>
    <!-- End: Page heading -->

    <!-- Start: Registrations table -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <table class="w-full">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Student</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Reg No</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Date registered</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $registration)
                <tr class="border-b border-slate-200 hover:bg-slate-50">
                    <td class="py-3 px-4 text-sm font-medium">{{ $registration->student->name }}</td>
                    <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->student->reg_no }}</td>
                    <td class="py-3 px-4 text-sm">{{ $registration->course->code }} — {{ $registration->course->name }}</td>
                    <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->created_at->format('M d, Y') }}</td>
                    <td class="py-3 px-4 text-sm">
                        <a href="{{ route('registrations.show', $registration->id) }}" class="text-[#7b1e2b] font-medium">View</a>
                        @can('manage registrations')
                            <a href="{{ route('registrations.edit', $registration->id) }}" class="text-[#7b1e2b] font-medium ml-3">Edit</a>
                            <form method="POST" action="{{ route('registrations.destroy', $registration->id) }}" class="inline">
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
    <!-- End: Registrations table -->

</div>
@endsection
