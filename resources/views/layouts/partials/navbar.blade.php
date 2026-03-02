<header class="top-header">
    <div class="flex items-center space-x-4">
        <button class="lg:hidden text-gray-500 hover:text-navy-primary transition-colors">
            <i class="fas fa-bars text-xl"></i>
        </button>

        <!-- Navbar Breadcrumb -->
        <nav class="flex items-center space-x-2 text-[11px] font-extrabold uppercase tracking-[0.15em]"
            aria-label="Breadcrumb">
            <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-navy-primary transition-colors">
                <i class="fas fa-home text-xs"></i>
            </a>
            @hasSection('breadcrumb')
                <i class="fas fa-chevron-right text-gray-200 text-[9px]"></i>
                <span class="text-navy-primary">@yield('breadcrumb')</span>
            @endif
        </nav>
    </div>

    <!-- Right Side: Utils & Time -->
    <div class="flex items-center space-x-8">
        <!-- Digital Clock -->
        <div class="hidden md:flex items-center space-x-6 text-gray-400">
            <div class="flex flex-col items-end">
                <span id="digital-clock"
                    class="text-sm font-black text-navy-dark tracking-tighter leading-none">00:00:00</span>
                <span
                    class="text-[9px] font-bold uppercase tracking-widest mt-1">{{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
            <div class="h-8 w-px bg-gray-100"></div>
        </div>

        <!-- Notification -->
        <div class="relative group cursor-pointer p-2">
            <div
                class="w-10 h-10 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400 group-hover:bg-navy-primary/5 group-hover:text-navy-primary transition-all">
                <i class="far fa-bell text-lg"></i>
            </div>
            <span
                class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white animate-pulse"></span>
        </div>
    </div>
</header>
