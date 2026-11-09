@extends('layouts.main')

@section('title', 'Registrations')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Start: Page heading -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-xl font-semibold">Course registrations</h1>
            <p class="text-sm text-[#B9AC9B] mt-1">Which students are registered for which courses.</p>
        </div>
        @canany(['manage registrations', 'register for courses'])
            <a href="{{ route('registrations.create') }}" class="px-4 py-2 bg-[#ECC412] rounded-lg text-sm font-medium text-[#0F0F0F] hover:bg-[#F5D54A]">Register for a course</a>
        @endcanany
    </div>
    <!-- End: Page heading -->

    <!-- Start: Registrations table -->
    <div class="bg-[#1A1A1A] border border-[#333333] rounded-xl overflow-hidden shadow-sm">
        <table class="w-full">
            <thead>
                <tr class="border-b border-[#333333] bg-[#141414]">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Student</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Reg No</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Course</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Date registered</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#B9AC9B]">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $registration)
                <tr class="border-b border-[#333333] hover:bg-[#262626]">
                    <td class="py-3 px-4 text-sm font-medium">{{ $registration->student->name }}</td>
                    <td class="py-3 px-4 text-sm text-[#B9AC9B]">{{ $registration->student->reg_no }}</td>
                    <td class="py-3 px-4 text-sm">{{ $registration->course->code }} — {{ $registration->course->name }}</td>
                    <td class="py-3 px-4 text-sm text-[#B9AC9B]">{{ $registration->created_at->format('M d, Y') }}</td>
                    <td class="py-3 px-4 text-sm">
                        <a href="{{ route('registrations.show', $registration->id) }}" class="text-[#ECC412] font-medium">View</a>
                        @can('manage registrations')
                            <a href="{{ route('registrations.edit', $registration->id) }}" class="text-[#ECC412] font-medium ml-3">Edit</a>
                            <form method="POST" action="{{ route('registrations.destroy', $registration->id) }}" class="inline">
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
    <!-- End: Registrations table -->

</div>
@endsection
