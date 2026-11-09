<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home') — Student Management System</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] } } } };
    </script>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-[#0F0F0F] text-[#E5D5C1] font-sans antialiased min-h-screen flex flex-col">

    @include('layouts.header')

    <!-- Start: Content -->
    <main class="flex-1 pt-20">
        @if (session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                <div class="p-4 rounded-lg bg-[#1C7F46] border border-[#1C7F46] text-sm text-white">{{ session('success') }}</div>
            </div>
        @endif
        @if (session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                <div class="p-4 rounded-lg bg-[#B0232B] border border-[#B0232B] text-sm text-white">{{ session('error') }}</div>
            </div>
        @endif

        @yield('content')
    </main>
    <!-- End: Content -->

    @include('layouts.footer')

    <script>lucide.createIcons();</script>
</body>
</html>
