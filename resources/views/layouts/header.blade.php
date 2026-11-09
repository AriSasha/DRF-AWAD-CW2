<!-- Start: Header -->
<header class="fixed top-0 left-0 right-0 z-50 bg-[#1A1A1A] border-b border-[#333333]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Student Management System" class="h-11 w-11">
                <div class="hidden sm:block">
                    <p class="text-sm font-semibold text-[#E5D5C1] leading-tight">Student Management System</p>
                    <p class="text-[11px] text-[#B9AC9B]">Makerere University Business School</p>
                </div>
            </a>

            <!-- Start: Navigation -->
            <nav class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="text-[#B9AC9B] hover:text-[#ECC412] text-sm font-medium">Home</a>

                @canany(['manage courses', 'view courses'])
                    <a href="{{ route('courses.index') }}" class="text-[#B9AC9B] hover:text-[#ECC412] text-sm font-medium">Courses</a>
                @endcanany

                @can('manage students')
                    <a href="{{ route('students.index') }}" class="text-[#B9AC9B] hover:text-[#ECC412] text-sm font-medium">Students</a>
                @endcan

                @canany(['manage registrations', 'view registrations'])
                    <a href="{{ route('registrations.index') }}" class="text-[#B9AC9B] hover:text-[#ECC412] text-sm font-medium">Registrations</a>
                @endcanany

                @guest
                    <a href="{{ route('login') }}" class="px-5 py-2.5 border border-[#333333] text-[#E5D5C1] rounded-lg font-medium text-sm hover:border-[#ECC412]">Sign in</a>
                @endguest

                @auth
                    <a href="{{ route('dashboard') }}" class="text-[#B9AC9B] hover:text-[#ECC412] text-sm font-medium">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-5 py-2.5 border border-[#333333] text-[#ECC412] rounded-lg font-medium text-sm hover:bg-[#262626]">Sign out</button>
                    </form>
                @endauth
            </nav>
            <!-- End: Navigation -->
        </div>
    </div>
    <!-- four-colour stripe under the header -->
    <div class="absolute bottom-0 left-0 right-0 flex h-1">
        <div class="flex-1 bg-[#B0232B]"></div>
        <div class="flex-1 bg-[#ECC412]"></div>
        <div class="flex-1 bg-[#0D5C9D]"></div>
        <div class="flex-1 bg-[#1C7F46]"></div>
    </div>
</header>
<!-- End: Header -->
