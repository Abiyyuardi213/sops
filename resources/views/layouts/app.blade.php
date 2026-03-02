<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SOPS - TNI AL') }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex h-full bg-[#f8fafc] font-sans antialiased text-gray-900">
    <!-- Toast Notifications -->
    @include('components.toast')

    <!-- Sidebar -->
    @include('layouts.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Navbar -->
        @include('layouts.partials.navbar')

        <!-- Main Content Area Scrollable -->
        <main class="flex-1 overflow-y-auto focus:outline-none p-8">
            <div class="max-w-7xl mx-auto min-h-full">
                @yield('content')
            </div>
        </main>

        <!-- Fixed Footer -->
        @include('layouts.partials.footer')
    </div>

    <!-- Modals -->
    @include('components.logout-modal')

    @stack('scripts')
</body>

</html>
