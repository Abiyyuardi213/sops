<aside class="nav-sidebar flex flex-col h-full shrink-0">
    <div class="h-14 flex items-center px-6 border-b border-border">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-md bg-primary flex items-center justify-center p-1.5 shadow-sm">
                <img src="{{ asset('image/koarmada2.png') }}" alt="Logo"
                    class="w-full h-full object-contain brightness-0 invert">
            </div>
            <div class="flex flex-col">
                <span class="text-[11px] font-bold tracking-tight text-primary leading-none uppercase">Admiral</span>
                <span
                    class="text-[9px] font-semibold text-muted-foreground uppercase tracking-widest leading-none mt-1">SOPS
                    ARMADA II</span>
            </div>
        </div>
    </div>

    <div class="flex-1 py-6 space-y-4 overflow-y-auto">
        <div class="space-y-1">
            <h4 class="px-7 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/50 mb-3">Area
                Umum</h4>
            <a href="{{ route('dashboard') }}"
                class="nav-item group {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-grid-2 text-[10px] transition-transform group-hover:scale-110"></i>
                <span class="flex-1">Dashboard</span>
            </a>
        </div>

        <div class="space-y-1">
            <h4 class="px-7 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/50 mb-3">Operasional
            </h4>
            <a href="{{ route('dermaga.index') }}"
                class="nav-item group {{ request()->routeIs('dermaga.*') ? 'active' : '' }}">
                <i class="fas fa-anchor text-[10px] transition-transform group-hover:scale-110"></i>
                <span class="flex-1">Manajemen Dermaga</span>
            </a>
            <a href="{{ route('satuan.index') }}"
                class="nav-item group {{ request()->routeIs('satuan.*') ? 'active' : '' }}">
                <i class="fas fa-layer-group text-[10px] transition-transform group-hover:scale-110"></i>
                <span class="flex-1">Manajemen Satuan</span>
            </a>
            <a href="#" class="nav-item group">
                <i class="fas fa-compass text-[10px] transition-transform group-hover:scale-110"></i>
                <span class="flex-1">Alur Pelayaran</span>
            </a>
        </div>

        <div class="space-y-1">
            <h4 class="px-7 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/50 mb-3">Admin
                Sistem</h4>
            <a href="{{ route('role.index') }}"
                class="nav-item group {{ request()->routeIs('role.*') ? 'active' : '' }}">
                <i class="fas fa-shield-alt text-[10px] transition-transform group-hover:scale-110"></i>
                <span class="flex-1">Peran & Izin</span>
            </a>
            <a href="{{ route('user.index') }}"
                class="nav-item group {{ request()->routeIs('user.*') ? 'active' : '' }}">
                <i class="fas fa-users-gear text-[10px] transition-transform group-hover:scale-110"></i>
                <span class="flex-1">Manajemen Pengguna</span>
            </a>
        </div>
    </div>

    <div class="p-4 border-t border-border bg-muted/30">
        <div class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-accent transition-all cursor-default">
            <div class="relative">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Pengguna') }}&background=003366&color=fff&semibold=true"
                    class="w-9 h-9 rounded-full ring-2 ring-background border border-border">
                <div class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full border-2 border-background">
                </div>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-[11px] font-bold text-foreground truncate uppercase tracking-wide">
                    {{ Auth::user()->name ?? 'Pengguna Tamu' }}
                </p>
                <p class="text-[9px] font-semibold text-muted-foreground truncate uppercase tracking-widest mt-0.5">
                    {{ Auth::user()->role->role_name ?? 'OPERATOR' }}
                </p>
            </div>
            <button type="button" onclick="showLogoutModal()"
                class="w-8 h-8 rounded-md flex items-center justify-center text-muted-foreground hover:text-destructive hover:bg-destructive/10 transition-all shadow-sm">
                <i class="fas fa-power-off text-xs"></i>
            </button>
        </div>
    </div>
</aside>
