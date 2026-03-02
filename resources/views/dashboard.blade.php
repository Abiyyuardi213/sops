@extends('layouts.app')

@section('title', '| Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="mb-8 animate-fade-in">
        <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Ringkasan Operasional</h2>
        <p class="text-gray-500 font-medium">Selamat datang di Pusat Kendali Staf Operasi Koarmada II</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="layout-card p-6 border-l-4 border-blue-600 hover:shadow-lg transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Personel</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['total_users'] }}</h3>
                </div>
                <div
                    class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 group-hover:scale-110 transition-transform">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-bold text-green-500">
                <i class="fas fa-arrow-up mr-1"></i>
                <span>2 Akun Baru Minggu Ini</span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="layout-card p-6 border-l-4 border-navy-dark hover:shadow-lg transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Kapal Aktif</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['active_ships'] }}</h3>
                </div>
                <div
                    class="w-12 h-12 bg-navy-dark/5 rounded-xl flex items-center justify-center text-navy-dark group-hover:scale-110 transition-transform">
                    <i class="fas fa-ship text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-bold text-gray-400">
                <i class="fas fa-anchor mr-1 text-navy-primary"></i>
                <span>Siaga Operasional</span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="layout-card p-6 border-l-4 border-amber-500 hover:shadow-lg transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Laporan Masuk</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['pending_reports'] }}</h3>
                </div>
                <div
                    class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-amber-500 group-hover:scale-110 transition-transform">
                    <i class="fas fa-file-invoice text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-bold text-amber-600">
                <i class="fas fa-clock mr-1"></i>
                <span>Membutuhkan Verifikasi</span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="layout-card p-6 border-l-4 border-indigo-600 hover:shadow-lg transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Akses Role</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['total_roles'] }}</h3>
                </div>
                <div
                    class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 group-hover:scale-110 transition-transform">
                    <i class="fas fa-user-shield text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-bold text-gray-400">
                <i class="fas fa-lock mr-1 text-indigo-400"></i>
                <span>Konfigurasi Hak Akses</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Activity -->
        <div class="lg:col-span-2 space-y-8">
            <div class="layout-card overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between bg-white">
                    <h3 class="font-bold text-gray-800 flex items-center">
                        <i class="fas fa-history mr-2 text-navy-primary"></i> Aktivitas Terakhir
                    </h3>
                    <button class="text-xs font-bold text-blue-600 hover:underline uppercase tracking-widest">Lihat
                        Semua</button>
                </div>
                <div class="p-0">
                    <div class="divide-y divide-gray-50">
                        <!-- Activity Item 1 -->
                        <div class="p-4 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div
                                class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0 text-xs">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-800 truncate">Pendaftaran User Baru</p>
                                <p class="text-xs text-gray-500">Admin menambahkan akun baru untuk <span
                                        class="text-navy-primary font-bold">Kolonel Laut (P) Andi</span></p>
                            </div>
                            <div class="text-[10px] text-gray-400 font-bold whitespace-nowrap">2 JAM LALU</div>
                        </div>

                        <!-- Activity Item 2 -->
                        <div class="p-4 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div
                                class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 flex-shrink-0 text-xs">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-800 truncate">Verifikasi Laporan Harian</p>
                                <p class="text-xs text-gray-500">Laporan operasional KRI bonto-123 telah diverifikasi</p>
                            </div>
                            <div class="text-[10px] text-gray-400 font-bold whitespace-nowrap">5 JAM LALU</div>
                        </div>

                        <!-- Activity Item 3 -->
                        <div class="p-4 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div
                                class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 flex-shrink-0 text-xs">
                                <i class="fas fa-key"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-800 truncate">Perubahan Hak Akses</p>
                                <p class="text-xs text-gray-500">Role 'Operator Dermaga' diperbarui hak aksesnya</p>
                            </div>
                            <div class="text-[10px] text-gray-400 font-bold whitespace-nowrap">KEMARIN</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- News/Notice board -->
            <div
                class="layout-card p-8 bg-gradient-to-br from-navy-dark to-navy-primary text-white relative overflow-hidden shadow-2xl">
                <div class="absolute top-0 right-0 p-4 opacity-10">
                    <i class="fas fa-ship text-9xl transform rotate-12 mt-10 mr-10"></i>
                </div>
                <div class="relative z-10">
                    <span
                        class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-[10px] font-bold uppercase tracking-widest border border-white/20">Pengumuman
                        Internal</span>
                    <h3 class="text-xl font-bold mt-4 mb-2">Pembaruan Sistem Operasional KRI</h3>
                    <p class="text-white/70 text-sm leading-relaxed mb-6">Pastikan seluruh data personel telah divalidasi
                        dengan NIP terbaru untuk sinkronisasi database pusat Armada.</p>
                    <button
                        class="bg-white text-navy-dark px-6 py-2.5 rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-gray-100 transition-colors">Baca
                        Selengkapnya</button>
                </div>
            </div>
        </div>

        <!-- Sidebar Widgets -->
        <div class="space-y-8">
            <!-- Weather/Status Widget -->
            <div class="layout-card p-6 bg-white flex flex-col items-center text-center">
                <div
                    class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-500 mb-4 animate-pulse">
                    <i class="fas fa-cloud-sun text-3xl"></i>
                </div>
                <h4 class="font-bold text-gray-800">Status Cuaca Pelabuhan</h4>
                <p class="text-3xl font-bold text-navy-dark my-1">29°C</p>
                <p class="text-xs text-gray-400 font-bold uppercase tracking-widest italic">Cerah Berawan | Surabaya</p>
                <div class="w-full h-px bg-gray-100 my-4"></div>
                <div class="flex justify-between w-full text-xs">
                    <div class="flex flex-col">
                        <span class="text-gray-400 font-bold">Angin</span>
                        <span class="text-navy-primary font-bold">12 Knot</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-400 font-bold">Gelombang</span>
                        <span class="text-navy-primary font-bold">0.5 - 1.25 m</span>
                    </div>
                </div>
            </div>

            <!-- Quick Access -->
            <div class="layout-card p-6">
                <h4 class="font-bold text-gray-800 mb-4 flex items-center border-b border-gray-50 pb-3">
                    <i class="fas fa-bolt mr-2 text-amber-500"></i> Akses Cepat
                </h4>
                <div class="grid grid-cols-2 gap-3 mt-4">
                    <a href="{{ route('user.create') }}"
                        class="p-4 bg-gray-50 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all text-center">
                        <i class="fas fa-user-plus mb-2 block"></i>
                        <span class="text-[10px] font-bold uppercase tracking-widest">Tambah User</span>
                    </a>
                    <a href="{{ route('role.index') }}"
                        class="p-4 bg-gray-50 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all text-center">
                        <i class="fas fa-shield-alt mb-2 block"></i>
                        <span class="text-[10px] font-bold uppercase tracking-widest">Kelola Role</span>
                    </a>
                    <a href="#"
                        class="p-4 bg-gray-50 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all text-center">
                        <i class="fas fa-file-export mb-2 block"></i>
                        <span class="text-[10px] font-bold uppercase tracking-widest">Ekspor Data</span>
                    </a>
                    <a href="#"
                        class="p-4 bg-gray-50 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all text-center">
                        <i class="fas fa-cog mb-2 block"></i>
                        <span class="text-[10px] font-bold uppercase tracking-widest">Pengaturan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
