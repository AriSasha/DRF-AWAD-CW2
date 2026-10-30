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
            <a href="{{ url('/courses/create') }}" class="px-4 py-2 bg-[#7b1e2b] rounded-lg text-sm font-medium text-white hover:bg-[#5f1621]">Add course</a>
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
                    @can('manage courses')
                    <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Actions</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm font-medium">BUC3131</td>
                        <td class="py-3 px-4 text-sm">Advanced Web Application Development</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Daniel Okello</td>
                        <td class="py-3 px-4 text-sm">42</td>
                        @can('manage courses')
                        <td class="py-3 px-4 text-center">
                            <a href="{{ url('/courses/1/edit') }}" class="text-[#7b1e2b] text-sm font-medium">Edit</a>
                            <form method="POST" action="{{ url('/courses/1') }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm font-medium ml-3">Delete</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm font-medium">BUC3126</td>
                        <td class="py-3 px-4 text-sm">Information Security and Auditing</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Grace Nakato</td>
                        <td class="py-3 px-4 text-sm">38</td>
                        @can('manage courses')
                        <td class="py-3 px-4 text-center">
                            <a href="{{ url('/courses/1/edit') }}" class="text-[#7b1e2b] text-sm font-medium">Edit</a>
                            <form method="POST" action="{{ url('/courses/1') }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm font-medium ml-3">Delete</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm font-medium">BUC3110</td>
                        <td class="py-3 px-4 text-sm">Mobile Application Development</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Daniel Okello</td>
                        <td class="py-3 px-4 text-sm">40</td>
                        @can('manage courses')
                        <td class="py-3 px-4 text-center">
                            <a href="{{ url('/courses/1/edit') }}" class="text-[#7b1e2b] text-sm font-medium">Edit</a>
                            <form method="POST" action="{{ url('/courses/1') }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm font-medium ml-3">Delete</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm font-medium">BUC3105</td>
                        <td class="py-3 px-4 text-sm">Database Management Systems</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Peter Mugisha</td>
                        <td class="py-3 px-4 text-sm">45</td>
                        @can('manage courses')
                        <td class="py-3 px-4 text-center">
                            <a href="{{ url('/courses/1/edit') }}" class="text-[#7b1e2b] text-sm font-medium">Edit</a>
                            <form method="POST" action="{{ url('/courses/1') }}" class="inline">
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
    <!-- End: Courses table -->

</div>
@endsection
