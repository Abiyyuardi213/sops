<aside class="nav-sidebar flex-shrink-0 flex flex-col h-full shadow-xl">
    <div class="p-6 flex items-center border-b border-white/10">
        <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center mr-3 p-1 shadow-sm">
            <img src="{{ asset('image/koarmada2.png') }}" alt="Logo Koarmada II" class="w-full h-full object-contain">
        </div>
        <div>
            <h1 class="text-white font-bold text-lg leading-tight">STAF OPERASI</h1>
            <p class="text-white/60 text-xs font-semibold uppercase tracking-wider">Koarmada II</p>
        </div>
    </div>

    <nav class="flex-1 mt-6 overflow-y-auto">
        <div class="px-6 mb-2 text-xs font-bold text-white/40 uppercase tracking-widest">General</div>
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-line"></i>
            <span>Dashboard</span>
        </a>

        <div class="px-6 mt-6 mb-2 text-xs font-bold text-white/40 uppercase tracking-widest">Operasional</div>
        <a href="{{ route('dermaga.index') }}" class="nav-item {{ request()->routeIs('dermaga.*') ? 'active' : '' }}">
            <i class="fas fa-anchor"></i>
            <span>Dermaga</span>
        </a>
        <a href="#" class="nav-item">
            <i class="fas fa-compass"></i>
            <span>Alur Pelayaran</span>
        </a>

        <div class="px-6 mt-6 mb-2 text-xs font-bold text-white/40 uppercase tracking-widest">Manajemen</div>
        <a href="{{ route('role.index') }}" class="nav-item {{ request()->routeIs('role.*') ? 'active' : '' }}">
            <i class="fas fa-user-shield"></i>
            <span>Manajemen Role</span>
        </a>
        <a href="{{ route('user.index') }}" class="nav-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <span>Pengguna</span>
        </a>
    </nav>

    <div class="p-4 border-t border-white/10">
        <div class="flex items-center text-white/80 p-2 hover:bg-white/5 rounded-lg group">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=0d6efd&color=fff"
                class="w-8 h-8 rounded-full mr-3 border border-white/20">
            <div class="flex-1 overflow-hidden">
                <p class="text-sm font-semibold truncate transition-colors group-hover:text-white">
                    {{ Auth::user()->name ?? 'Guest' }}</p>
                <p class="text-xs text-white/50 truncate italic">{{ Auth::user()->role->role_name ?? 'No Role' }}
                </p>
            </div>
            <button type="button" onclick="showLogoutModal()" class="text-white/40 hover:text-white transition-colors">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </div>
    </div>
</aside>
