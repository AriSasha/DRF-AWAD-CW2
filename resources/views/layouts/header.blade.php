<!-- Start: Header -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Student Management System" class="h-11 w-11">
                <div class="hidden sm:block">
                    <p class="text-sm font-semibold text-slate-900 leading-tight">Student Management System</p>
                    <p class="text-[11px] text-slate-500">Makerere University Business School</p>
                </div>
            </a>

            <!-- Start: Navigation -->
            <nav class="flex items-center gap-6">
                <a href="{{ url('/') }}" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Home</a>

                @canany(['manage courses', 'view courses'])
                    <a href="{{ url('/courses') }}" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Courses</a>
                @endcanany

                @can('manage students')
                    <a href="{{ url('/students') }}" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Students</a>
                @endcan

                @canany(['manage registrations', 'view registrations'])
                    <a href="{{ url('/registrations') }}" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Registrations</a>
                @endcanany

                @guest
                    <a href="{{ url('/login') }}" class="px-5 py-2.5 border border-slate-200 text-slate-900 rounded-lg font-medium text-sm hover:border-[#7b1e2b]/40">Sign in</a>
                    <a href="{{ url('/register') }}" class="px-5 py-2.5 bg-[#7b1e2b] text-white rounded-lg font-medium text-sm hover:bg-[#5f1621]">Create account</a>
                @endguest

                @auth
                    <a href="{{ url('/dashboard') }}" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Dashboard</a>
                    <form method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <button type="submit" class="px-5 py-2.5 border border-slate-200 text-[#7b1e2b] rounded-lg font-medium text-sm hover:bg-rose-50">Sign out</button>
                    </form>
                @endauth
            </nav>
            <!-- End: Navigation -->
        </div>
    </div>
</header>
<!-- End: Header -->
