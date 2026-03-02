@extends('layouts.app')

@section('title', '| Tambah Dermaga')
@section('breadcrumb', 'Tambah Dermaga')

@section('content')
    <div class="mb-8 flex items-center space-x-4 animate-fade-in">
        <a href="{{ route('dermaga.index') }}"
            class="w-10 h-10 bg-white border border-gray-100 rounded-lg flex items-center justify-center text-gray-400 hover:text-blue-600 hover:border-blue-100 transition-all hover:shadow-sm">
            <i class="fas fa-chevron-left text-xs"></i>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Form Tambah Dermaga</h2>
            <p class="text-gray-500 font-medium italic">Registrasi infrastruktur baru Koarmada II</p>
        </div>
    </div>

    <form action="{{ route('dermaga.store') }}" method="POST" class="max-w-5xl mx-auto space-y-6 pb-20">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Column: Basic Info & Specs -->
            <div class="lg:col-span-8 space-y-8">
                <!-- Basic Info Card -->
                <div class="layout-card p-8">
                    <div class="flex items-center space-x-3 mb-8 border-b border-gray-50 pb-5">
                        <div
                            class="w-10 h-10 bg-navy-primary/5 rounded-xl flex items-center justify-center text-navy-primary">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h3 class="text-sm font-extrabold text-navy-dark uppercase tracking-widest">Informasi Dasar</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div class="md:col-span-2 space-y-2">
                            <label for="nama_dermaga"
                                class="text-[11px] font-bold text-gray-400 uppercase tracking-widest flex justify-between">
                                <span>Nama Dermaga</span>
                                <span class="text-navy-primary font-black italic text-[9px]">REQUIRED</span>
                            </label>
                            <input type="text" name="nama_dermaga" id="nama_dermaga" required class="form-input"
                                placeholder="Misal: Dermaga Madura Barat" value="{{ old('nama_dermaga') }}">
                            @error('nama_dermaga')
                                <p class="text-red-500 text-[10px] mt-2 font-bold italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="kode_dermaga"
                                class="text-[11px] font-bold text-gray-400 uppercase tracking-widest flex justify-between">
                                <span>Kode Dermaga</span>
                                <span class="text-navy-primary font-black italic text-[9px]">AUTO-GENERATED</span>
                            </label>
                            <input type="text" name="kode_dermaga" id="kode_dermaga" required
                                class="form-input bg-gray-50 font-mono font-bold" placeholder="DMG-001"
                                value="{{ old('kode_dermaga', $suggestedCode) }}">
                            @error('kode_dermaga')
                                <p class="text-red-500 text-[10px] mt-2 font-bold italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="tipe_dermaga"
                                class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Struktur
                                Dermaga</label>
                            <select name="tipe_dermaga" id="tipe_dermaga" required class="form-input cursor-pointer">
                                @foreach ($tipeOptions as $option)
                                    <option value="{{ $option }}"
                                        {{ old('tipe_dermaga') == $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Dimensions & Geo Card -->
                <div class="layout-card p-8">
                    <div class="flex items-center space-x-3 mb-8 border-b border-gray-50 pb-5">
                        <div class="w-10 h-10 bg-blue-500/5 rounded-xl flex items-center justify-center text-blue-600">
                            <i class="fas fa-ruler-combined"></i>
                        </div>
                        <h3 class="text-sm font-extrabold text-navy-dark uppercase tracking-widest">Spesifikasi & Geografis
                        </h3>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="space-y-2">
                            <label for="panjang_m"
                                class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Panjang <span
                                    class="text-[9px] lowercase font-medium">(meter)</span></label>
                            <div class="relative">
                                <input type="number" step="0.1" name="panjang_m" id="panjang_m" required
                                    class="form-input pr-10" placeholder="0.0" value="{{ old('panjang_m') }}">
                                <span
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300 text-[10px] font-bold">M</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="lebar_m"
                                class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Lebar <span
                                    class="text-[9px] lowercase font-medium">(meter)</span></label>
                            <div class="relative">
                                <input type="number" step="0.1" name="lebar_m" id="lebar_m" required
                                    class="form-input pr-10" placeholder="0.0" value="{{ old('lebar_m') }}">
                                <span
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300 text-[10px] font-bold">M</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="kedalaman_min_lws"
                                class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Min Depth</label>
                            <div class="relative font-mono">
                                <input type="number" step="0.1" name="kedalaman_min_lws" id="kedalaman_min_lws"
                                    required class="form-input pr-10 text-blue-600 font-bold" placeholder="0.0"
                                    value="{{ old('kedalaman_min_lws') }}">
                                <span
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-200 text-[10px] font-bold">LWS</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="kedalaman_max_lws"
                                class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Max Depth</label>
                            <div class="relative font-mono">
                                <input type="number" step="0.1" name="kedalaman_max_lws" id="kedalaman_max_lws"
                                    required class="form-input pr-10 text-blue-600 font-bold" placeholder="0.0"
                                    value="{{ old('kedalaman_max_lws') }}">
                                <span
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-200 text-[10px] font-bold">LWS</span>
                            </div>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="latitude"
                                class="text-[11px] font-bold text-gray-400 uppercase tracking-widest flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-[10px]"></i> Latitude
                            </label>
                            <input type="text" name="latitude" id="latitude" class="form-input font-mono"
                                placeholder="-7.206584" value="{{ old('latitude') }}">
                        </div>
                        <div class="space-y-2 md:col-span-2">
                            <label for="longitude"
                                class="text-[11px] font-bold text-gray-400 uppercase tracking-widest flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-[10px]"></i> Longitude
                            </label>
                            <input type="text" name="longitude" id="longitude" class="form-input font-mono"
                                placeholder="112.730302" value="{{ old('longitude') }}">
                        </div>
                    </div>
                </div>

                <!-- Operational Notes Card -->
                <div class="layout-card p-8">
                    <div class="flex items-center space-x-3 mb-8 border-b border-gray-50 pb-5">
                        <div class="w-10 h-10 bg-gray-500/5 rounded-xl flex items-center justify-center text-gray-600">
                            <i class="fas fa-comment-alt"></i>
                        </div>
                        <h3 class="text-sm font-extrabold text-navy-dark uppercase tracking-widest">Catatan Operasional
                        </h3>
                    </div>
                    <textarea name="catatan_operasional" id="catatan_operasional" rows="4" class="form-input resize-none"
                        placeholder="Tuliskan catatan khusus atau instruksi operasional untuk dermaga ini...">{{ old('catatan_operasional') }}</textarea>
                </div>
            </div>

            <!-- Right Column: Status & Facilities -->
            <div class="lg:col-span-4 space-y-8">
                <!-- Status Card -->
                <div class="layout-card p-8">
                    <div class="flex items-center space-x-3 mb-8 border-b border-gray-50 pb-5">
                        <div class="w-10 h-10 bg-amber-500/5 rounded-xl flex items-center justify-center text-amber-600">
                            <i class="fas fa-signal"></i>
                        </div>
                        <h3 class="text-sm font-extrabold text-navy-dark uppercase tracking-widest">Status Saat Ini</h3>
                    </div>

                    <div class="space-y-3">
                        @foreach ($statusOptions as $option)
                            <label
                                class="group relative flex items-center px-4 py-3.5 border border-gray-100 rounded-2xl cursor-pointer hover:border-navy-primary/30 hover:bg-navy-primary/5 transition-all">
                                <input type="radio" name="status" value="{{ $option }}"
                                    class="w-4 h-4 text-navy-primary border-gray-300 focus:ring-0"
                                    {{ old('status', 'Tersedia') == $option ? 'checked' : '' }}>
                                <span
                                    class="ml-4 text-[12px] font-extrabold text-gray-600 uppercase tracking-widest group-hover:text-navy-primary transition-colors">{{ $option }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Facilities Card -->
                <div class="layout-card p-8">
                    <div class="flex items-center space-x-3 mb-8 border-b border-gray-50 pb-5">
                        <div class="w-10 h-10 bg-teal-500/5 rounded-xl flex items-center justify-center text-teal-600">
                            <i class="fas fa-plug"></i>
                        </div>
                        <h3 class="text-sm font-extrabold text-navy-dark uppercase tracking-widest">Fasilitas Penunjang
                        </h3>
                    </div>

                    <div class="space-y-3">
                        @foreach ($fasilitasOptions as $fasilitas)
                            <label class="flex items-center px-2 py-1 group cursor-pointer">
                                <div class="relative flex items-center">
                                    <input type="checkbox" name="fasilitas[]" value="{{ $fasilitas }}"
                                        class="w-5 h-5 rounded border-gray-200 text-navy-primary focus:ring-0 transition-all checked:bg-navy-primary"
                                        {{ in_array($fasilitas, old('fasilitas', [])) ? 'checked' : '' }}>
                                </div>
                                <span
                                    class="ml-4 text-[11px] font-bold text-gray-500 group-hover:text-gray-800 transition-colors uppercase tracking-tight">{{ $fasilitas }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Action Card -->
                <div class="layout-card p-6 bg-navy-dark border-none shadow-xl shadow-navy-dark/30">
                    <button type="submit"
                        class="w-full h-14 bg-white text-navy-dark font-black text-xs uppercase tracking-[0.2em] rounded-xl hover:-translate-y-1 hover:shadow-2xl transition-all active:scale-95">
                        Simpan Data <i class="fas fa-save ml-3"></i>
                    </button>
                    <a href="{{ route('dermaga.index') }}"
                        class="block w-full text-center mt-5 text-[10px] font-bold text-white/40 uppercase tracking-widest hover:text-white transition-colors">
                        Batalkan Registrasi
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection
