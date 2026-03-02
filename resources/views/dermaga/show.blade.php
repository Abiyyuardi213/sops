@extends('layouts.app')

@section('title', '| Detail Dermaga')
@section('breadcrumb', 'Detail Dermaga')

@section('content')
    <div class="space-y-8 animate-fade-in-down">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center space-x-5">
                <a href="{{ route('dermaga.index') }}"
                    class="group w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 hover:border-navy-primary/30 transition-all">
                    <i class="fas fa-arrow-left text-gray-400 group-hover:text-navy-primary transition-colors"></i>
                </a>
                <div>
                    <div
                        class="flex items-center space-x-3 text-[10px] font-black uppercase tracking-[0.2em] text-navy-primary/50 mb-1">
                        <i class="fas fa-anchor text-[8px]"></i>
                        <span>Infrastruktur Sandar</span>
                    </div>
                    <h2 class="text-3xl font-black text-navy-dark tracking-tight">{{ $dermaga->nama_dermaga }}</h2>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('dermaga.edit', $dermaga->id) }}"
                    class="px-6 py-3 bg-white border border-gray-200 text-navy-dark font-black rounded-2xl text-[11px] uppercase tracking-widest hover:bg-navy-dark hover:text-white hover:border-navy-dark transition-all flex items-center shadow-sm">
                    <i class="fas fa-edit mr-3 text-blue-500"></i> Edit Informasi
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Left Column: Detailed Info -->
            <div class="lg:col-span-8 space-y-8">

                <!-- Technical Specifications Grid -->
                <div class="layout-card p-1">
                    <div class="bg-gray-50/50 rounded-2xl p-8">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-10 h-10 bg-navy-primary rounded-xl flex items-center justify-center text-white shadow-lg shadow-navy-primary/20">
                                    <i class="fas fa-microchip text-sm"></i>
                                </div>
                                <h3 class="text-sm font-black text-navy-dark uppercase tracking-widest">Spesifikasi Teknis
                                </h3>
                            </div>
                            <span
                                class="px-3 py-1 bg-navy-dark text-white text-[9px] font-black rounded-full uppercase tracking-widest">{{ $dermaga->kode_dermaga }}</span>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                            <div class="space-y-2">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tipe Dermaga</p>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-layer-group text-navy-primary/30 text-xs"></i>
                                    <span class="text-sm font-black text-navy-dark">{{ $dermaga->tipe_dermaga }}</span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Panjang Efektif</p>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-ruler-horizontal text-navy-primary/30 text-xs"></i>
                                    <span class="text-sm font-black text-navy-dark">{{ $dermaga->panjang_m }} <small
                                            class="text-gray-400">M</small></span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Lebar Struktur</p>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-ruler-vertical text-navy-primary/30 text-xs"></i>
                                    <span class="text-sm font-black text-navy-dark">{{ $dermaga->lebar_m }} <small
                                            class="text-gray-400">M</small></span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Kedalaman (LWS)</p>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-water text-blue-500/30 text-xs"></i>
                                    <span
                                        class="text-sm font-black text-blue-600">{{ $dermaga->kedalaman_min_lws }}-{{ $dermaga->kedalaman_max_lws }}
                                        <small class="opacity-70">M</small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Facilities Checklist -->
                    <div class="layout-card p-8">
                        <div class="flex items-center space-x-3 mb-8">
                            <div class="w-10 h-10 bg-teal-50 rounded-xl flex items-center justify-center text-teal-600">
                                <i class="fas fa-bolt text-sm"></i>
                            </div>
                            <h3 class="text-[11px] font-black text-navy-dark uppercase tracking-widest">Fasilitas Penunjang
                            </h3>
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            @if ($dermaga->fasilitas && count($dermaga->fasilitas) > 0)
                                @foreach ($dermaga->fasilitas as $f)
                                    <div
                                        class="flex items-center justify-between p-4 bg-white border border-gray-100 rounded-2xl hover:border-teal-200 transition-all group">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-2 h-2 rounded-full bg-teal-500 shadow-[0_0_10px_rgba(20,184,166,0.5)]">
                                            </div>
                                            <span
                                                class="text-[11px] font-black text-navy-dark uppercase tracking-wide">{{ $f }}</span>
                                        </div>
                                        <i
                                            class="fas fa-check text-teal-600 text-[10px] opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-10 opacity-40">
                                    <i class="fas fa-box-open text-3xl mb-3 block"></i>
                                    <p class="text-[10px] font-bold uppercase tracking-widest">Data Fasilitas Kosong</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Location / Map Placeholder -->
                    <div class="layout-card p-8 group">
                        <div class="flex items-center space-x-3 mb-8">
                            <div class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600">
                                <i class="fas fa-map-marker-alt text-sm"></i>
                            </div>
                            <h3 class="text-[11px] font-black text-navy-dark uppercase tracking-widest">Lokasi Geografis
                            </h3>
                        </div>

                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="flex-1 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">Latitude
                                    </p>
                                    <span
                                        class="text-xs font-black text-navy-dark font-mono">{{ $dermaga->latitude ?? 'Not Set' }}</span>
                                </div>
                                <div class="flex-1 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1">Longitude
                                    </p>
                                    <span
                                        class="text-xs font-black text-navy-dark font-mono">{{ $dermaga->longitude ?? 'Not Set' }}</span>
                                </div>
                            </div>

                            <div
                                class="relative w-full h-40 bg-navy-dark/90 rounded-2xl overflow-hidden flex items-center justify-center group-hover:scale-[1.02] transition-transform duration-500">
                                <div
                                    class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
                                </div>
                                <div class="relative text-center">
                                    <div
                                        class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-3 animate-pulse border border-white/20">
                                        <i class="fas fa-satellite text-white/40"></i>
                                    </div>
                                    <p class="text-[9px] font-bold text-white/30 uppercase tracking-[0.3em]">Map Integration
                                        Ready</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Operational Log / Notes -->
                <div class="layout-card overflow-hidden">
                    <div class="bg-amber-50/50 p-8 border-b border-amber-100/50">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600">
                                <i class="fas fa-sticky-note text-sm"></i>
                            </div>
                            <h3 class="text-[11px] font-black text-navy-dark uppercase tracking-widest">Catatan Operasional
                            </h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <div
                            class="p-6 bg-white border border-dashed border-amber-200 rounded-2xl min-h-[100px] flex items-center justify-center relative">
                            <i class="fas fa-quote-left absolute top-4 left-4 text-amber-100 text-2xl"></i>
                            <p class="text-sm font-medium text-gray-600 italic text-center leading-relaxed px-8">
                                {{ $dermaga->catatan_operasional ?: 'Saat ini belum terdapat catatan operasional khusus untuk dermaga ini.' }}
                            </p>
                            <i class="fas fa-quote-right absolute bottom-4 right-4 text-amber-100 text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Status & Timeline -->
            <div class="lg:col-span-4 space-y-8">
                <!-- Status Monitoring Card -->
                <div class="layout-card p-1">
                    @php
                        $statusConfig = [
                            'Tersedia' => ['color' => 'green', 'icon' => 'fa-check-circle', 'bg' => 'bg-green-500/10'],
                            'Penuh' => ['color' => 'amber', 'icon' => 'fa-ship', 'bg' => 'bg-amber-500/10'],
                            'Perbaikan' => ['color' => 'blue', 'icon' => 'fa-tools', 'bg' => 'bg-blue-500/10'],
                            'Non-Aktif' => ['color' => 'red', 'icon' => 'fa-ban', 'bg' => 'bg-red-500/10'],
                        ];
                        $config = $statusConfig[$dermaga->status] ?? $statusConfig['Tersedia'];
                    @endphp
                    <div class="bg-white rounded-2xl p-8 border border-gray-100">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-8 text-center">Status
                            Operasional</p>

                        <div class="relative flex items-center justify-center mb-10">
                            <!-- Progress Ring-like deco -->
                            <div class="absolute w-32 h-32 border-4 border-gray-50 rounded-full"></div>
                            <div
                                class="absolute w-32 h-32 border-t-4 border-{{ $config['color'] }}-500 rounded-full animate-spin-slow">
                            </div>

                            <div
                                class="w-24 h-24 {{ $config['bg'] }} rounded-full flex items-center justify-center border-4 border-white shadow-xl">
                                <i class="fas {{ $config['icon'] }} text-3xl text-{{ $config['color'] }}-600"></i>
                            </div>
                        </div>

                        <div class="text-center space-y-2 mb-8">
                            <h4 class="text-2xl font-black text-navy-dark uppercase tracking-wider">{{ $dermaga->status }}
                            </h4>
                            <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest italic">Terakhir
                                diperbarui: {{ $dermaga->updated_at->diffForHumans() }}</p>
                        </div>

                        <div class="grid grid-cols-1 gap-4 pt-8 border-t border-gray-50">
                            <div class="flex justify-between items-center px-4 py-3 bg-gray-50 rounded-xl">
                                <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Entry
                                    Date</span>
                                <span
                                    class="text-[10px] font-black text-navy-dark">{{ $dermaga->created_at->format('d/m/Y') }}</span>
                            </div>
                            <div class="flex justify-between items-center px-4 py-3 bg-gray-50 rounded-xl">
                                <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Registry
                                    ID</span>
                                <span
                                    class="text-[10px] font-black text-navy-dark">#{{ str_pad($dermaga->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Integration / Logs -->
                <div
                    class="layout-card p-10 bg-navy-dark border-none shadow-2xl shadow-navy-dark/40 overflow-hidden relative">
                    <!-- Deco Icon -->
                    <i
                        class="fas fa-shield-alt absolute -bottom-10 -right-10 text-white/[0.03] text-[150px] rotate-12"></i>

                    <div class="relative space-y-8">
                        <div class="space-y-2">
                            <h3 class="text-white font-black text-sm uppercase tracking-widest">Activity Insight</h3>
                            <p class="text-white/40 text-[10px] font-bold leading-relaxed uppercase tracking-wider">Modul
                                monitor pergerakan kapal & log aktivitas segera hadir.</p>
                        </div>

                        <div class="p-6 bg-white/[0.03] border border-white/10 rounded-2xl">
                            <div class="flex items-center space-x-4 mb-4 opacity-50">
                                <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center">
                                    <i class="fas fa-link text-white text-xs"></i>
                                </div>
                                <span class="text-[10px] font-bold text-white uppercase tracking-widest italic">Wait for
                                    sync...</span>
                            </div>
                            <div class="w-full h-1.5 bg-white/5 rounded-full overflow-hidden">
                                <div class="w-1/3 h-full bg-blue-500 shadow-[0_0_10px_rgba(59,130,246,1)]"></div>
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
            animation: spin-slow 8s linear infinite;
        }
    </style>
@endsection
