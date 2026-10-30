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
            <a href="{{ url('/students/create') }}" class="px-4 py-2 bg-[#7b1e2b] rounded-lg text-sm font-medium text-white hover:bg-[#5f1621]">Add student</a>
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
                    @can('manage students')
                    <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Actions</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm font-medium">24/U/01001/PS</td>
                        <td class="py-3 px-4 text-sm">Aisha Namuli</td>
                        <td class="py-3 px-4 text-sm text-slate-500">aisha.namuli@mubs.ac.ug</td>
                        <td class="py-3 px-4 text-sm">Business Computing</td>
                        <td class="py-3 px-4 text-sm">3</td>
                        @can('manage students')
                        <td class="py-3 px-4 text-center">
                            <a href="{{ url('/students/1/edit') }}" class="text-[#7b1e2b] text-sm font-medium">Edit</a>
                            <form method="POST" action="{{ url('/students/1') }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm font-medium ml-3">Delete</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm font-medium">24/U/01002/PS</td>
                        <td class="py-3 px-4 text-sm">Brian Kato</td>
                        <td class="py-3 px-4 text-sm text-slate-500">brian.kato@mubs.ac.ug</td>
                        <td class="py-3 px-4 text-sm">Business Computing</td>
                        <td class="py-3 px-4 text-sm">2</td>
                        @can('manage students')
                        <td class="py-3 px-4 text-center">
                            <a href="{{ url('/students/1/edit') }}" class="text-[#7b1e2b] text-sm font-medium">Edit</a>
                            <form method="POST" action="{{ url('/students/1') }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm font-medium ml-3">Delete</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm font-medium">24/U/01003/PS</td>
                        <td class="py-3 px-4 text-sm">Catherine Achieng</td>
                        <td class="py-3 px-4 text-sm text-slate-500">catherine.achieng@mubs.ac.ug</td>
                        <td class="py-3 px-4 text-sm">Business Statistics</td>
                        <td class="py-3 px-4 text-sm">4</td>
                        @can('manage students')
                        <td class="py-3 px-4 text-center">
                            <a href="{{ url('/students/1/edit') }}" class="text-[#7b1e2b] text-sm font-medium">Edit</a>
                            <form method="POST" action="{{ url('/students/1') }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm font-medium ml-3">Delete</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm font-medium">24/U/01004/PS</td>
                        <td class="py-3 px-4 text-sm">David Ssemwanga</td>
                        <td class="py-3 px-4 text-sm text-slate-500">david.ssemwanga@mubs.ac.ug</td>
                        <td class="py-3 px-4 text-sm">Business Computing</td>
                        <td class="py-3 px-4 text-sm">3</td>
                        @can('manage students')
                        <td class="py-3 px-4 text-center">
                            <a href="{{ url('/students/1/edit') }}" class="text-[#7b1e2b] text-sm font-medium">Edit</a>
                            <form method="POST" action="{{ url('/students/1') }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm font-medium ml-3">Delete</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm font-medium">24/U/01005/PS</td>
                        <td class="py-3 px-4 text-sm">Esther Nabirye</td>
                        <td class="py-3 px-4 text-sm text-slate-500">esther.nabirye@mubs.ac.ug</td>
                        <td class="py-3 px-4 text-sm">Procurement</td>
                        <td class="py-3 px-4 text-sm">2</td>
                        @can('manage students')
                        <td class="py-3 px-4 text-center">
                            <a href="{{ url('/students/1/edit') }}" class="text-[#7b1e2b] text-sm font-medium">Edit</a>
                            <form method="POST" action="{{ url('/students/1') }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm font-medium ml-3">Delete</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
            </tbody>
        </table>
    </div>
    <!-- End: Students table -->

</div>
@endsection
