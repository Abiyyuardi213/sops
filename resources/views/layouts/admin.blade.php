<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SOPS - Admiral') }} @yield('title')</title>

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

<body class="flex h-full bg-background font-sans antialiased text-foreground">
    <!-- Toast Notifications -->
    @include('components.toast')

    <!-- Sidebar -->
    @include('layouts.partials.sidebar')

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Navbar -->
        @include('layouts.partials.navbar')

        <!-- Content Area -->
        <main class="flex-1 overflow-y-auto focus:outline-none scroll-smooth">
            <div class="max-w-7xl mx-auto p-6 lg:p-10 min-h-full">
                @yield('content')
            </div>

            <!-- Footer -->
            @include('layouts.partials.footer')
        </main>
    </div>

    <!-- Modals -->
    @include('components.logout-modal')

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const clock = document.getElementById('digital-clock');
            if (clock) {
                setInterval(() => {
                    clock.innerText = new Date().toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                        hour12: false
                    });
                }, 1000);
            }
        });
    </script>
</body>

</html>
