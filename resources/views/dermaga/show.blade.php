@extends('layouts.admin')

@section('title', '| Detail Dermaga')
@section('breadcrumb', 'Asset Details')

@section('content')
    <div class="space-y-8 animate-fade-in-down">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center space-x-5">
                <a href="{{ route('dermaga.index') }}"
                    class="group w-10 h-10 bg-background rounded-md flex items-center justify-center border border-input hover:border-primary/50 transition-all shadow-sm">
                    <i
                        class="fas fa-chevron-left text-muted-foreground group-hover:text-primary transition-colors text-xs"></i>
                </a>
                <div>
                    <div
                        class="flex items-center space-x-3 text-[10px] font-bold uppercase tracking-[0.2em] text-primary/50 mb-1">
                        <i class="fas fa-anchor text-[8px]"></i>
                        <span>Infrastruktur Sandar — {{ $dermaga->kode_dermaga }}</span>
                    </div>
                    <h2 class="text-3xl font-bold text-primary tracking-tight">{{ $dermaga->nama_dermaga }}</h2>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('dermaga.edit', $dermaga->id) }}" class="btn-primary">
                    <i class="fas fa-edit mr-3"></i> Edit Data Informasi
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Main Stats & Info -->
            <div class="lg:col-span-8 space-y-8">

                <!-- Technical Specs Grid -->
                <div class="layout-card overflow-hidden">
                    <div class="bg-muted/30 p-8 border-b border-border">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white shadow-lg shadow-primary/20">
                                    <i class="fas fa-microchip text-sm"></i>
                                </div>
                                <h3 class="text-[11px] font-bold text-primary uppercase tracking-[0.3em]">Spesifikasi
                                    Teknis</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
                            <div class="space-y-2">
                                <p
                                    class="text-[10px] font-bold text-muted-foreground uppercase tracking-widest opacity-50">
                                    Tipe Konstruksi</p>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-layer-group text-primary/30 text-xs"></i>
                                    <span class="text-sm font-bold text-primary">{{ $dermaga->tipe_dermaga }}</span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p
                                    class="text-[10px] font-bold text-muted-foreground uppercase tracking-widest opacity-50">
                                    Panjang Efektif</p>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-ruler-horizontal text-primary/30 text-xs"></i>
                                    <span class="text-sm font-bold text-primary">{{ $dermaga->panjang_m }} <small
                                            class="text-muted-foreground opacity-50">M</small></span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p
                                    class="text-[10px] font-bold text-muted-foreground uppercase tracking-widest opacity-50">
                                    Lebar Struktur</p>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-ruler-vertical text-primary/30 text-xs"></i>
                                    <span class="text-sm font-bold text-primary">{{ $dermaga->lebar_m }} <small
                                            class="text-muted-foreground opacity-50">M</small></span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p
                                    class="text-[10px] font-bold text-muted-foreground uppercase tracking-widest opacity-50">
                                    Kedalaman (LWS)</p>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-water text-blue-500/30 text-xs"></i>
                                    <span
                                        class="text-sm font-bold text-blue-600">{{ $dermaga->kedalaman_min_lws }}-{{ $dermaga->kedalaman_max_lws }}
                                        <small class="opacity-70">M</small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Facilities -->
                    <div class="layout-card p-8">
                        <div class="flex items-center space-x-3 mb-8">
                            <div class="w-10 h-10 bg-teal-500/5 rounded-xl flex items-center justify-center text-teal-600">
                                <i class="fas fa-bolt text-sm"></i>
                            </div>
                            <h3 class="text-[11px] font-bold text-primary uppercase tracking-[0.3em]">Support Facilities
                            </h3>
                        </div>

                        <div class="grid grid-cols-1 gap-2.5">
                            @if ($dermaga->fasilitas && count($dermaga->fasilitas) > 0)
                                @foreach ($dermaga->fasilitas as $f)
                                    <div
                                        class="flex items-center justify-between p-4 bg-muted/20 border border-border/50 rounded-xl hover:bg-muted/40 transition-all group">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-1.5 h-1.5 rounded-full bg-teal-500 shadow-[0_0_8px_rgba(20,184,166,0.6)]">
                                            </div>
                                            <span
                                                class="text-[10px] font-bold text-primary uppercase tracking-wide">{{ $f }}</span>
                                        </div>
                                        <i
                                            class="fas fa-check text-teal-600 text-[10px] opacity-20 group-hover:opacity-100 transition-opacity"></i>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-10 border-2 border-dashed border-muted rounded-2xl">
                                    <i class="fas fa-box-open text-2xl text-muted-foreground/30 mb-3 block"></i>
                                    <p class="text-[9px] font-bold text-muted-foreground/50 uppercase tracking-[0.3em]">No
                                        registered facilities</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Geolocation -->
                    <div class="layout-card p-8 group">
                        <div class="flex items-center space-x-3 mb-8">
                            <div
                                class="w-10 h-10 bg-indigo-500/5 rounded-xl flex items-center justify-center text-indigo-600">
                                <i class="fas fa-map-marker-alt text-sm"></i>
                            </div>
                            <h3 class="text-[11px] font-bold text-primary uppercase tracking-[0.3em]">Geographic Hub</h3>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 bg-background border border-border rounded-xl">
                                    <p
                                        class="text-[9px] font-bold text-muted-foreground uppercase tracking-widest opacity-40 mb-1">
                                        Latitude</p>
                                    <span
                                        class="text-[11px] font-bold text-primary font-mono tabular-nums leading-none">{{ $dermaga->latitude ?? 'UNSET' }}</span>
                                </div>
                                <div class="p-4 bg-background border border-border rounded-xl">
                                    <p
                                        class="text-[9px] font-bold text-muted-foreground uppercase tracking-widest opacity-40 mb-1">
                                        Longitude</p>
                                    <span
                                        class="text-[11px] font-bold text-primary font-mono tabular-nums leading-none">{{ $dermaga->longitude ?? 'UNSET' }}</span>
                                </div>
                            </div>

                            <div
                                class="relative w-full h-40 bg-primary/95 rounded-2xl overflow-hidden flex items-center justify-center border border-primary">
                                <div
                                    class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
                                </div>
                                <div class="relative text-center">
                                    <div
                                        class="w-12 h-12 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-3 border border-white/10 animate-pulse">
                                        <i class="fas fa-satellite text-white/30 text-lg"></i>
                                    </div>
                                    <p class="text-[9px] font-bold text-white/20 uppercase tracking-[0.4em]">Satellite
                                        Ready</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                <div class="layout-card overflow-hidden">
                    <div class="bg-amber-50/50 p-6 border-b border-amber-100/50">
                        <div class="flex items-center space-x-3">
                            <div class="w-9 h-9 bg-amber-100 rounded-lg flex items-center justify-center text-amber-600">
                                <i class="fas fa-message text-xs"></i>
                            </div>
                            <h3 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em]">Operational Directive
                            </h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="p-8 bg-amber-50/20 border border-dashed border-amber-200/50 rounded-2xl relative">
                            <i class="fas fa-quote-left absolute top-4 left-4 text-amber-500/10 text-3xl"></i>
                            <p class="text-sm font-medium text-muted-foreground italic text-center leading-relaxed px-10">
                                {{ $dermaga->catatan_operasional ?: 'Currently no critical operational notes or directives for this infrastructure.' }}
                            </p>
                            <i class="fas fa-quote-right absolute bottom-4 right-4 text-amber-500/10 text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Monitoring -->
            <div class="lg:col-span-4 space-y-8">
                <!-- Dynamic Status Ring -->
                <div class="layout-card p-1">
                    @php
                        $statusConfig = [
                            'Tersedia' => ['color' => 'green', 'icon' => 'fa-circle-check', 'bg' => 'bg-green-500/10'],
                            'Penuh' => ['color' => 'amber', 'icon' => 'fa-ship', 'bg' => 'bg-amber-500/10'],
                            'Perbaikan' => [
                                'color' => 'blue',
                                'icon' => 'fa-screwdriver-wrench',
                                'bg' => 'bg-blue-500/10',
                            ],
                            'Non-Aktif' => ['color' => 'red', 'icon' => 'fa-ban', 'bg' => 'bg-red-500/10'],
                        ];
                        $config = $statusConfig[$dermaga->status] ?? $statusConfig['Tersedia'];
                    @endphp
                    <div class="bg-white rounded-2xl p-10 border border-border">
                        <p
                            class="text-[10px] font-bold text-muted-foreground uppercase tracking-[0.4em] mb-10 text-center opacity-40">
                            Live Status Feed</p>

                        <div class="relative flex items-center justify-center mb-12">
                            <div class="absolute w-40 h-40 border-8 border-muted rounded-full"></div>
                            <div
                                class="absolute w-40 h-40 border-t-8 border-{{ $config['color'] }}-500 rounded-full animate-spin-slow">
                            </div>

                            <div
                                class="w-28 h-28 {{ $config['bg'] }} rounded-full flex items-center justify-center border-4 border-white shadow-2xl transition-all hover:scale-105">
                                <i class="fas {{ $config['icon'] }} text-4xl text-{{ $config['color'] }}-600"></i>
                            </div>
                        </div>

                        <div class="text-center space-y-3 mb-10">
                            <h4 class="text-3xl font-bold text-primary uppercase tracking-tighter">{{ $dermaga->status }}
                            </h4>
                            <p
                                class="text-[9px] font-bold text-muted-foreground uppercase tracking-[0.2em] italic opacity-60">
                                Last telemetry: {{ $dermaga->updated_at->diffForHumans() }}</p>
                        </div>

                        <div class="space-y-3 pt-10 border-t border-border/50">
                            <div
                                class="flex justify-between items-center px-4 py-3 bg-muted/30 rounded-xl border border-border/50">
                                <span
                                    class="text-[9px] font-bold text-muted-foreground uppercase tracking-widest opacity-40">Registry
                                    Date</span>
                                <span
                                    class="text-[11px] font-bold text-primary font-mono tabular-nums leading-none">{{ $dermaga->created_at->format('d M Y') }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center px-4 py-3 bg-muted/30 rounded-xl border border-border/50">
                                <span
                                    class="text-[9px] font-bold text-muted-foreground uppercase tracking-widest opacity-40">System
                                    UID</span>
                                <span
                                    class="text-[11px] font-bold text-primary font-mono tabular-nums leading-none">#{{ str_pad($dermaga->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity Logs Integration -->
                <div
                    class="layout-card p-10 bg-primary border-none shadow-2xl shadow-primary/40 relative overflow-hidden group">
                    <i
                        class="fas fa-shield-halved absolute -bottom-10 -right-10 text-white/[0.04] text-[180px] rotate-12 group-hover:scale-110 transition-transform duration-700"></i>

                    <div class="relative space-y-10">
                        <div class="space-y-3">
                            <h3 class="text-white font-bold text-xs uppercase tracking-[0.2em]">Activity Intelligence</h3>
                            <p class="text-white/40 text-[10px] font-bold leading-relaxed uppercase tracking-widest">
                                Berthing movement & operational logs integration in progress.</p>
                        </div>

                        <div class="p-6 bg-white/[0.04] border border-white/10 rounded-2xl">
                            <div class="flex items-center space-x-4 mb-5 opacity-40">
                                <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center">
                                    <i class="fas fa-link text-white text-[10px]"></i>
                                </div>
                                <span class="text-[10px] font-bold text-white uppercase tracking-[0.2em] italic">AWAITING
                                    SYNC...</span>
                            </div>
                            <div class="w-full h-1 bg-white/5 rounded-full overflow-hidden">
                                <div class="w-1/3 h-full bg-blue-500 shadow-[0_0_15px_rgba(59,130,246,1)]"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin-slow 12s linear infinite;
        }
    </style>
@endsection
