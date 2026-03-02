<header class="top-header">
    <div class="flex items-center gap-4">
        <button
            class="lg:hidden w-9 h-9 flex items-center justify-center rounded-md border border-input hover:bg-accent text-muted-foreground transition-all">
            <i class="fas fa-bars-staggered text-sm"></i>
        </button>

        <!-- Dynamic Title/Slug -->
        <div class="flex items-center gap-4">
            <div class="h-6 w-px bg-border hidden md:block"></div>
            <div class="flex items-center gap-2">
                <span class="text-[10px] font-bold uppercase tracking-[0.3em] text-muted-foreground/40">Tampilan
                    Saat Ini</span>
                <i class="fas fa-arrow-right text-[8px] text-muted-foreground/20"></i>
                <span class="text-[11px] font-bold uppercase tracking-widest text-primary">@yield('breadcrumb', 'Dashboard')</span>
            </div>
        </div>
    </div>

    <!-- Right Side Tools -->
    <div class="flex items-center gap-6">
        <!-- Live Clock & Date -->
        <div class="hidden lg:flex items-center gap-6 bg-muted/50 px-4 py-1.5 rounded-full border border-border/50">
            <div class="flex flex-col items-end">
                <span id="digital-clock"
                    class="text-xs font-bold text-primary tracking-tighter tabular-nums leading-none line-height-1">00:00:00</span>
                <span
                    class="text-[8px] font-bold text-muted-foreground uppercase tracking-widest mt-1 opacity-70">{{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
            <div class="h-6 w-px bg-border/60"></div>
            <div class="relative group cursor-pointer">
                <div
                    class="w-8 h-8 rounded-full flex items-center justify-center text-muted-foreground group-hover:text-primary transition-all">
                    <i class="far fa-bell text-sm"></i>
                </div>
                <span
                    class="absolute top-1.5 right-1.5 w-2 h-2 bg-primary rounded-full border-2 border-background animate-pulse"></span>
            </div>
        </div>

        <!-- Global Search Placeholder -->
        <div
            class="hidden md:flex items-center w-64 h-9 px-3 rounded-md border border-input bg-muted/30 text-muted-foreground text-[10px] font-bold uppercase tracking-widest cursor-text gap-3 hover:border-primary/30 transition-all">
            <i class="fas fa-search"></i>
            <span>Cari cepat...</span>
            <span class="ml-auto px-1.5 py-0.5 rounded border border-border bg-background text-[8px]">⌘K</span>
        </div>
    </div>
</header>
