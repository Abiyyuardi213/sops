@extends('layouts.app')

@section('title', '| Manajemen Dermaga')
@section('breadcrumb', 'Manajemen Dermaga')

@section('content')
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Daftar Dermaga</h2>
            <p class="text-gray-500 font-medium italic text-sm">Pengelolaan infrastruktur sandar Koarmada II</p>
        </div>
        <a href="{{ route('dermaga.create') }}"
            class="btn-primary flex items-center px-5 py-2.5 rounded-lg shadow-sm font-semibold transition-all hover:shadow-md">
            <i class="fas fa-plus mr-2 text-sm"></i>
            Tambah Dermaga
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
        <!-- Stats summary -->
        <div class="layout-card p-4 flex items-center space-x-4 border-l-4 border-green-500">
            <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center text-green-600">
                <i class="fas fa-check-circle"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Tersedia</p>
                <h4 class="text-xl font-bold text-gray-800 leading-none">
                    {{ $dermagas->where('status', 'Tersedia')->count() }}</h4>
            </div>
        </div>
        <div class="layout-card p-4 flex items-center space-x-4 border-l-4 border-amber-500">
            <div class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center text-amber-600">
                <i class="fas fa-ship"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Penuh</p>
                <h4 class="text-xl font-bold text-gray-800 leading-none">{{ $dermagas->where('status', 'Penuh')->count() }}
                </h4>
            </div>
        </div>
        <div class="layout-card p-4 flex items-center space-x-4 border-l-4 border-blue-500">
            <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">
                <i class="fas fa-tools"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Perbaikan</p>
                <h4 class="text-xl font-bold text-gray-800 leading-none">
                    {{ $dermagas->where('status', 'Perbaikan')->count() }}</h4>
            </div>
        </div>
        <div class="layout-card p-4 flex items-center space-x-4 border-l-4 border-gray-400">
            <div class="w-10 h-10 bg-gray-50 rounded-lg flex items-center justify-center text-gray-600">
                <i class="fas fa-ban"></i>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Non-Aktif</p>
                <h4 class="text-xl font-bold text-gray-800 leading-none">
                    {{ $dermagas->where('status', 'Non-Aktif')->count() }}</h4>
            </div>
        </div>
    </div>

    <div class="layout-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-navy-dark text-white">
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider text-center w-16">No</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider">Info Dermaga</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider">Dimensi (m)</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider text-center">Kedalaman (LWS)</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider">Fasilitas Utama</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider text-center">Status</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse($dermagas as $key => $dermaga)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-gray-400">{{ $key + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-navy-dark leading-tight">{{ $dermaga->nama_dermaga }}</span>
                                    <span
                                        class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">{{ $dermaga->kode_dermaga }}
                                        | {{ $dermaga->tipe_dermaga }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col text-xs">
                                    <span class="text-gray-600 font-medium">Panjang: <span
                                            class="font-bold">{{ $dermaga->panjang_m }} m</span></span>
                                    <span class="text-gray-600 font-medium">Lebar: <span
                                            class="font-bold">{{ $dermaga->lebar_m }} m</span></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="px-2 py-1 bg-blue-50 rounded-lg inline-block border border-blue-100">
                                    <span class="text-blue-700 font-bold">{{ $dermaga->kedalaman_min_lws }} -
                                        {{ $dermaga->kedalaman_max_lws }} m</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @if ($dermaga->fasilitas)
                                        @foreach ($dermaga->fasilitas as $fasilitas)
                                            <span
                                                class="px-1.5 py-0.5 bg-gray-100 text-[9px] text-gray-500 font-bold rounded uppercase tracking-tighter">{{ $fasilitas }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-gray-300 italic text-[10px]">- Tidak ada data -</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @php
                                    $statusClasses = [
                                        'Tersedia' => 'bg-green-100 text-green-700 border-green-200',
                                        'Penuh' => 'bg-amber-100 text-amber-700 border-amber-200',
                                        'Perbaikan' => 'bg-blue-100 text-blue-700 border-blue-200',
                                        'Non-Aktif' => 'bg-red-100 text-red-700 border-red-200',
                                    ];
                                    $class =
                                        $statusClasses[$dermaga->status] ?? 'bg-gray-100 text-gray-700 border-gray-200';
                                @endphp
                                <span
                                    class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border {{ $class }}">
                                    {{ $dermaga->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-1">
                                    <a href="{{ route('dermaga.show', $dermaga->id) }}"
                                        class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors border border-transparent hover:border-indigo-100"
                                        title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('dermaga.edit', $dermaga->id) }}"
                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors border border-transparent hover:border-blue-100"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dermaga.destroy', $dermaga->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus data dermaga ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors border border-transparent hover:border-red-100"
                                            title="Hapus">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-anchor text-gray-200 text-5xl mb-4"></i>
                                    <p class="text-gray-400 font-medium italic">Belum ada data dermaga terdaftar.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
