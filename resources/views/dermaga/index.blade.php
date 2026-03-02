@extends('layouts.admin')

@section('title', '| Manajemen Dermaga')
@section('breadcrumb', 'Inventory & Berthing')

@section('content')
    <div class="space-y-8 animate-fade-in-down">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div
                    class="flex items-center space-x-3 text-[10px] font-bold uppercase tracking-[0.2em] text-primary/50 mb-1">
                    <i class="fas fa-layer-group text-[8px]"></i>
                    <span>Database Aset</span>
                </div>
                <h2 class="text-3xl font-bold text-primary tracking-tight">Manajemen Dermaga</h2>
            </div>

            <div class="flex items-center space-x-3">
                <button class="btn-outline">
                    <i class="fas fa-file-excel mr-2 opacity-50"></i> Export
                </button>
                <a href="{{ route('dermaga.create') }}" class="btn-primary">
                    <i class="fas fa-plus mr-2 text-[10px]"></i> Registrasi Dermaga
                </a>
            </div>
        </div>

        <!-- Quick Insights -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @php
                $stats_data = [
                    [
                        'label' => 'Available',
                        'val' => $dermagas->where('status', 'Tersedia')->count(),
                        'color' => 'green',
                        'icon' => 'fa-check',
                    ],
                    [
                        'label' => 'Occupied',
                        'val' => $dermagas->where('status', 'Penuh')->count(),
                        'color' => 'amber',
                        'icon' => 'fa-ship',
                    ],
                    [
                        'label' => 'Maintenance',
                        'val' => $dermagas->where('status', 'Perbaikan')->count(),
                        'color' => 'blue',
                        'icon' => 'fa-wrench',
                    ],
                    [
                        'label' => 'Decommissioned',
                        'val' => $dermagas->where('status', 'Non-Aktif')->count(),
                        'color' => 'red',
                        'icon' => 'fa-ban',
                    ],
                ];
            @endphp
            @foreach ($stats_data as $s)
                <div class="layout-card p-5 flex items-center gap-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-{{ $s['color'] }}-500/10 flex items-center justify-center text-{{ $s['color'] }}-600">
                        <i class="fas {{ $s['icon'] }} text-xs"></i>
                    </div>
                    <div>
                        <p class="text-[9px] font-bold uppercase tracking-widest text-muted-foreground">{{ $s['label'] }}
                        </p>
                        <h4 class="text-xl font-bold text-primary leading-none">{{ $s['val'] }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Main Data Table -->
        <div class="layout-card overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-muted/30 border-b border-border">
                            <th
                                class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70 text-center w-16">
                                #</th>
                            <th
                                class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70">
                                Infrastruktur</th>
                            <th
                                class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70">
                                Teknis (M)</th>
                            <th
                                class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70 text-center">
                                Depth (LWS)</th>
                            <th
                                class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70">
                                Status</th>
                            <th
                                class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70 text-center">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border bg-white">
                        @forelse($dermagas as $key => $dermaga)
                            <tr class="group hover:bg-muted/20 transition-all duration-200">
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="text-[10px] font-bold text-muted-foreground/40">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm font-bold text-primary leading-tight group-hover:text-primary transition-colors">{{ $dermaga->nama_dermaga }}</span>
                                        <span
                                            class="text-[9px] text-muted-foreground font-bold uppercase tracking-widest mt-1">{{ $dermaga->kode_dermaga }}
                                            — {{ $dermaga->tipe_dermaga }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[9px] font-bold text-muted-foreground uppercase opacity-50">Length</span>
                                            <span class="text-[11px] font-bold text-primary">{{ $dermaga->panjang_m }}
                                                M</span>
                                        </div>
                                        <div class="h-6 w-px bg-border/50"></div>
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[9px] font-bold text-muted-foreground uppercase opacity-50">Width</span>
                                            <span class="text-[11px] font-bold text-primary">{{ $dermaga->lebar_m }}
                                                M</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="px-3 py-1.5 bg-blue-500/5 text-blue-600 text-[10px] font-bold rounded-lg border border-blue-500/10 tabular-nums">
                                        {{ $dermaga->kedalaman_min_lws }} - {{ $dermaga->kedalaman_max_lws }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $statusClasses = [
                                            'Tersedia' => 'bg-green-500/10 text-green-700 border-green-500/20',
                                            'Penuh' => 'bg-amber-500/10 text-amber-700 border-amber-500/20',
                                            'Perbaikan' => 'bg-blue-500/10 text-blue-700 border-blue-500/20',
                                            'Non-Aktif' => 'bg-red-500/10 text-red-700 border-red-500/20',
                                        ];
                                        $class =
                                            $statusClasses[$dermaga->status] ??
                                            'bg-muted text-muted-foreground border-border';
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-widest border {{ $class }}">
                                        <span class="w-1 h-1 rounded-full bg-current mr-2 animate-pulse"></span>
                                        {{ $dermaga->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('dermaga.show', $dermaga->id) }}"
                                            class="w-8 h-8 rounded-md border border-border flex items-center justify-center text-muted-foreground hover:bg-primary hover:text-white hover:border-primary transition-all shadow-sm"
                                            title="View Details">
                                            <i class="fas fa-eye text-[10px]"></i>
                                        </a>
                                        <a href="{{ route('dermaga.edit', $dermaga->id) }}"
                                            class="w-8 h-8 rounded-md border border-border flex items-center justify-center text-muted-foreground hover:bg-primary hover:text-white hover:border-primary transition-all shadow-sm"
                                            title="Edit">
                                            <i class="fas fa-pen text-[10px]"></i>
                                        </a>
                                        <form action="{{ route('dermaga.destroy', $dermaga->id) }}" method="POST"
                                            onsubmit="return confirm('Archive this infrastructure?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-8 h-8 rounded-md border border-border flex items-center justify-center text-muted-foreground hover:bg-destructive hover:text-white hover:border-destructive transition-all shadow-sm"
                                                title="Archive">
                                                <i class="fas fa-trash-can text-[10px]"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center opacity-30 select-none">
                                        <i class="fas fa-database text-4xl mb-4"></i>
                                        <p class="text-[10px] font-bold uppercase tracking-[0.3em]">No Infrastructure Data
                                            Found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
