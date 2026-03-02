@extends('layouts.admin')

@section('title', '| Dashboard')
@section('breadcrumb', 'Ringkasan Dashboard')

@section('content')
    <div class="space-y-8 animate-fade-in-down">
        <!-- Hero / Welcome -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold text-primary">Pusat Kontrol Admiral</h2>
                <p class="text-sm font-medium text-muted-foreground mt-1 uppercase tracking-widest italic opacity-70">Sistem
                    Informasi Operasional Koarmada II</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="btn-outline">
                    <i class="fas fa-download mr-2 opacity-50"></i> Ekspor Laporan
                </button>
                <button class="btn-primary">
                    <i class="fas fa-plus mr-2"></i> Entri Log Baru
                </button>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="layout-card p-6 flex flex-col justify-between group hover:border-primary/50">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground">Total Personel</p>
                    <div
                        class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                        <i class="fas fa-users-gear text-xs"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-primary">{{ $stats['total_users'] }}</h3>
                    <div class="mt-2 flex items-center text-[10px] font-semibold text-green-600">
                        <i class="fas fa-arrow-trend-up mr-2"></i>
                        <span>+2 akun minggu ini</span>
                    </div>
                </div>
            </div>

            <div class="layout-card p-6 flex flex-col justify-between group hover:border-primary/50">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground">Kapal Aktif</p>
                    <div
                        class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                        <i class="fas fa-ship text-xs"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-primary">{{ $stats['active_ships'] }}</h3>
                    <div class="mt-2 flex items-center text-[10px] font-semibold text-muted-foreground">
                        <i class="fas fa-anchor mr-2 opacity-50"></i>
                        <span>Kesiapan Operasional</span>
                    </div>
                </div>
            </div>

            <div class="layout-card p-6 flex flex-col justify-between group hover:border-primary/50">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground">Kesatuan Kapal</p>
                    <div
                        class="w-8 h-8 rounded-lg bg-orange-500/10 flex items-center justify-center text-orange-600 group-hover:bg-orange-500 group-hover:text-white transition-all">
                        <i class="fas fa-layer-group text-xs"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-primary">{{ $stats['total_satuans'] }}</h3>
                    <div class="mt-2 flex items-center text-[10px] font-semibold text-muted-foreground">
                        <i class="fas fa-sitemap mr-2 opacity-50"></i>
                        <span>Struktur Komando</span>
                    </div>
                </div>
            </div>

            <div class="layout-card p-6 flex flex-col justify-between group hover:border-primary/50">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground">Peran Sistem</p>
                    <div
                        class="w-8 h-8 rounded-lg bg-indigo-500/10 flex items-center justify-center text-indigo-600 group-hover:bg-indigo-500 group-hover:text-white transition-all">
                        <i class="fas fa-shield-halved text-xs"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-primary">{{ $stats['total_roles'] }}</h3>
                    <div class="mt-2 flex items-center text-[10px] font-semibold text-muted-foreground">
                        <i class="fas fa-key mr-2 opacity-50"></i>
                        <span>Lapisan Izin</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Panel -->
            <div class="lg:col-span-2 space-y-8">
                <div class="layout-card overflow-hidden">
                    <div class="h-14 flex items-center justify-between px-6 border-b border-border bg-muted/20">
                        <h3 class="text-[11px] font-bold text-primary uppercase tracking-[0.3em] flex items-center">
                            <i class="fas fa-clock-rotate-left mr-3 opacity-30"></i> Umpan Aktivitas Langsung
                        </h3>
                        <a href="#"
                            class="text-[9px] font-bold text-primary hover:underline uppercase tracking-widest">Arsip</a>
                    </div>
                    <div class="p-0">
                        <div class="divide-y divide-border">
                            <div class="p-6 flex items-start gap-4 hover:bg-muted/30 transition-all group">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 shrink-0 text-[10px]">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-bold text-primary uppercase tracking-wide">Registri - Personel
                                    </p>
                                    <p class="text-[11px] text-muted-foreground font-medium mt-1">Akun baru disiapkan
                                        untuk <span class="text-primary font-bold">Kolonel Laut (P) Andi</span></p>
                                </div>
                                <div
                                    class="text-[9px] font-bold text-muted-foreground/40 whitespace-nowrap uppercase tracking-widest">
                                    2 jam yang lalu</div>
                            </div>

                            <div class="p-6 flex items-start gap-4 hover:bg-muted/30 transition-all group">
                                <div
                                    class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-green-600 shrink-0 text-[10px]">
                                    <i class="fas fa-check-double"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-bold text-primary uppercase tracking-wide">Validasi - Laporan
                                    </p>
                                    <p class="text-[11px] text-muted-foreground font-medium mt-1">Log operasional harian
                                        untuk
                                        <span class="text-primary font-bold">KRI Bonto-123</span> terverifikasi
                                    </p>
                                </div>
                                <div
                                    class="text-[9px] font-bold text-muted-foreground/40 whitespace-nowrap uppercase tracking-widest">
                                    5 jam yang lalu</div>
                            </div>

                            <div class="p-6 flex items-start gap-4 hover:bg-muted/30 transition-all group">
                                <div
                                    class="w-8 h-8 rounded-full bg-amber-50 flex items-center justify-center text-amber-600 shrink-0 text-[10px]">
                                    <i class="fas fa-shield-cat"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-bold text-primary uppercase tracking-wide">Keamanan - Audit</p>
                                    <p class="text-[11px] text-muted-foreground font-medium mt-1">Pemetaan izin untuk
                                        peran <span class="text-primary font-bold">Operator Dermaga</span> diubah</p>
                                </div>
                                <div
                                    class="text-[9px] font-bold text-muted-foreground/40 whitespace-nowrap uppercase tracking-widest">
                                    Kemarin</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- News Board -->
                <div class="layout-card bg-primary p-12 text-white relative overflow-hidden group">
                    <i
                        class="fas fa-shield-alt absolute -bottom-10 -right-10 text-white/[0.03] text-[200px] rotate-12 transition-transform group-hover:scale-110"></i>
                    <div class="relative z-10 max-w-lg">
                        <span
                            class="px-3 py-1 bg-white/10 rounded-full text-[9px] font-bold uppercase tracking-[0.2em] border border-white/20">Direktif
                            Operasional</span>
                        <h3 class="text-3xl font-bold mt-6 leading-tight tracking-tighter">Sinkronisasi Database Terpadu
                        </h3>
                        <p class="text-white/60 text-sm font-medium mt-4 leading-relaxed">Pastikan semua profil personel
                            divalidasi dengan ID registri saat ini. Sinkronisasi otomatis dengan Markas Besar Komando
                            dimulai dalam 48 jam.</p>
                        <div class="mt-8 flex items-center gap-4">
                            <button
                                class="px-6 py-2.5 bg-white text-primary rounded-lg text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-white/90 transition-all">Baca
                                Direktif</button>
                            <button
                                class="px-6 py-2.5 bg-white/10 text-white rounded-lg text-[10px] font-bold uppercase tracking-[0.2em] border border-white/20 hover:bg-white/5 transition-all">Abaikan</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side Widgets -->
            <div class="space-y-8">
                <!-- Port Intelligence -->
                <div class="layout-card p-8">
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="w-20 h-20 bg-muted/50 rounded-3xl flex items-center justify-center text-primary mb-6 border border-border">
                            <i class="fas fa-cloud-bolt text-4xl opacity-50"></i>
                        </div>
                        <h4 class="text-[11px] font-bold text-muted-foreground uppercase tracking-[0.3em] mb-1">
                            Environmental Status</h4>
                        <p class="text-4xl font-bold text-primary tracking-tighter line-height-1">29.4&deg;C</p>
                        <p class="text-[10px] font-semibold text-muted-foreground uppercase tracking-widest mt-2">Cerah
                            Berawan
                            | Surabaya</p>

                        <div class="w-full h-px bg-border/50 my-6"></div>

                        <div class="grid grid-cols-2 w-full gap-4">
                            <div class="flex flex-col text-center p-3 bg-muted/30 rounded-xl">
                                <span class="text-[9px] font-semibold text-muted-foreground uppercase mb-1">Kecepatan
                                    Angin</span>
                                <span class="text-xs font-bold text-primary uppercase">12 Knots</span>
                            </div>
                            <div class="flex flex-col text-center p-3 bg-muted/30 rounded-xl">
                                <span class="text-[9px] font-semibold text-muted-foreground uppercase mb-1">Tinggi
                                    Gelombang</span>
                                <span class="text-xs font-bold text-primary uppercase">0.8m - 1.2m</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Cluster -->
                <div class="layout-card p-8">
                    <h4 class="text-[11px] font-bold text-primary uppercase tracking-[0.3em] mb-6 flex items-center">
                        <i class="fas fa-bolt-lightning mr-3 text-amber-500"></i> Tindakan Taktis
                    </h4>
                    <div class="grid grid-cols-1 gap-3">
                        <a href="{{ route('user.create') }}"
                            class="flex items-center gap-4 p-4 bg-muted/30 rounded-2xl hover:bg-accent transition-all group">
                            <div
                                class="w-9 h-9 bg-white border border-border rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-user-plus text-xs text-primary/50"></i>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-primary">Penyediaan
                                Personel</span>
                        </a>

                        <a href="{{ route('role.index') }}"
                            class="flex items-center gap-4 p-4 bg-muted/30 rounded-2xl hover:bg-accent transition-all group">
                            <div
                                class="w-9 h-9 bg-white border border-border rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-lock text-xs text-primary/50"></i>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-primary">Protokol
                                Keamanan</span>
                        </a>

                        <a href="{{ route('dermaga.create') }}"
                            class="flex items-center gap-4 p-4 bg-muted/30 rounded-2xl hover:bg-accent transition-all group">
                            <div
                                class="w-9 h-9 bg-white border border-border rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-anchor text-xs text-primary/50"></i>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-primary">Registri
                                Sandar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
