@extends('layouts.main')

@section('content')

    <!-- Start: Hero -->
    <section class="bg-white pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-5 leading-tight">
                Students, courses and registrations<br>
                <span class="text-[#7b1e2b]">in one place.</span>
            </h1>
            <p class="text-sm sm:text-base text-slate-500 max-w-2xl mx-auto mb-8 leading-relaxed">
                Administrators manage student and course records. Lecturers see their courses and the students registered for them. Students see the courses on offer and the ones they have registered for.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ url('/login') }}" class="px-6 py-3 bg-[#7b1e2b] text-white rounded-lg font-medium text-sm hover:bg-[#5f1621]">Sign in</a>
                <a href="{{ url('/register') }}" class="px-6 py-3 border border-slate-200 text-slate-900 rounded-lg font-medium text-sm hover:border-[#7b1e2b]/40">Create account</a>
            </div>
        </div>
    </section>
    <!-- End: Hero -->

    <!-- Start: How it works -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-center mb-10">How it works</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white border border-slate-200 rounded-xl p-6">
                    <p class="text-[#d97706] font-bold mb-2">Step 1</p>
                    <h3 class="font-semibold mb-2">Sign in</h3>
                    <p class="text-sm text-slate-500">Log in with your university email. The system knows if you are an administrator, lecturer or student.</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-xl p-6">
                    <p class="text-[#d97706] font-bold mb-2">Step 2</p>
                    <h3 class="font-semibold mb-2">Pick a course</h3>
                    <p class="text-sm text-slate-500">Students browse the available courses and register for the ones they are taking this semester.</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-xl p-6">
                    <p class="text-[#d97706] font-bold mb-2">Step 3</p>
                    <h3 class="font-semibold mb-2">Stay up to date</h3>
                    <p class="text-sm text-slate-500">Lecturers see who registered for their courses, and administrators keep all records correct.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End: How it works -->

    <!-- Start: Who can use it -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-center mb-10">Who can use it</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="border border-slate-200 rounded-xl p-6">
                    <i data-lucide="shield" class="w-6 h-6 text-[#7b1e2b] mb-3"></i>
                    <h3 class="font-semibold mb-2">Administrators</h3>
                    <p class="text-sm text-slate-500">Add and update students, courses and registrations, and control who can access the system.</p>
                </div>
                <div class="border border-slate-200 rounded-xl p-6">
                    <i data-lucide="presentation" class="w-6 h-6 text-[#7b1e2b] mb-3"></i>
                    <h3 class="font-semibold mb-2">Lecturers</h3>
                    <p class="text-sm text-slate-500">View the courses assigned to them and the students registered in each one.</p>
                </div>
                <div class="border border-slate-200 rounded-xl p-6">
                    <i data-lucide="graduation-cap" class="w-6 h-6 text-[#7b1e2b] mb-3"></i>
                    <h3 class="font-semibold mb-2">Students</h3>
                    <p class="text-sm text-slate-500">View available courses, register for them and see their own registrations.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Who can use it -->

@endsection
