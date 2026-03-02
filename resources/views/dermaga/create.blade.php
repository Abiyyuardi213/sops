@extends('layouts.admin')

@section('title', '| Registrasi Dermaga')
@section('breadcrumb', 'Register New Infrastructure')

@section('content')
    <div class="space-y-8 animate-fade-in-down">
        <!-- Header Area -->
        <div class="flex items-center space-x-5">
            <a href="{{ route('dermaga.index') }}"
                class="group w-10 h-10 bg-background rounded-md flex items-center justify-center border border-input hover:border-primary/50 transition-all shadow-sm">
                <i class="fas fa-chevron-left text-muted-foreground group-hover:text-primary transition-colors text-xs"></i>
            </a>
            <div>
                <div
                    class="flex items-center space-x-3 text-[10px] font-bold uppercase tracking-[0.2em] text-primary/50 mb-1">
                    <i class="fas fa-plus-circle text-[8px]"></i>
                    <span>Data Acquisition</span>
                </div>
                <h2 class="text-3xl font-bold text-primary tracking-tight">Registrasi Fasilitas Baru</h2>
            </div>
        </div>

        <form action="{{ route('dermaga.store') }}" method="POST" class="space-y-8 pb-20">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Core Configurations -->
                <div class="lg:col-span-8 space-y-8">
                    <!-- Identity Card -->
                    <div class="layout-card overflow-hidden">
                        <div class="bg-muted/30 p-6 border-b border-border">
                            <h3 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] flex items-center">
                                <i class="fas fa-id-card-clip mr-3 opacity-30"></i> Identity & Character
                            </h3>
                        </div>
                        <div class="p-8 space-y-6">
                            <div class="space-y-2">
                                <label for="nama_dermaga"
                                    class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Infrastructure
                                    Name</label>
                                <input type="text" name="nama_dermaga" id="nama_dermaga" required class="form-input"
                                    placeholder="e.g. Dermaga Madura Utara - Sektor B" value="{{ old('nama_dermaga') }}">
                                @error('nama_dermaga')
                                    <p class="text-destructive text-[10px] font-bold mt-1 uppercase tracking-tighter italic">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="kode_dermaga"
                                        class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Registry
                                        ID <span
                                            class="text-primary/40 font-bold ml-2 opacity-50 italic text-[8px]">(AUTO)</span></label>
                                    <input type="text" name="kode_dermaga" id="kode_dermaga" required
                                        class="form-input bg-muted/30 font-mono font-bold tracking-widest"
                                        value="{{ old('kode_dermaga', $suggestedCode) }}">
                                </div>
                                <div class="space-y-2">
                                    <label for="tipe_dermaga"
                                        class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Structural
                                        Class</label>
                                    <select name="tipe_dermaga" id="tipe_dermaga" required
                                        class="form-input appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22currentColor%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.2em] bg-[right_0.75rem_center] bg-no-repeat">
                                        @foreach ($tipeOptions as $option)
                                            <option value="{{ $option }}"
                                                {{ old('tipe_dermaga') == $option ? 'selected' : '' }}>{{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Technical Specs -->
                    <div class="layout-card overflow-hidden">
                        <div class="bg-muted/30 p-6 border-b border-border">
                            <h3 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] flex items-center">
                                <i class="fas fa-ruler-combined mr-3 opacity-30"></i> Technical Specifications
                            </h3>
                        </div>
                        <div class="p-8 grid grid-cols-2 md:grid-cols-4 gap-6">
                            <div class="space-y-2">
                                <label for="panjang_m"
                                    class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Length
                                    <span class="text-[8px] opacity-40 lowercase">(m)</span></label>
                                <input type="number" step="0.1" name="panjang_m" id="panjang_m" required
                                    class="form-input text-primary font-bold tabular-nums" placeholder="0.0"
                                    value="{{ old('panjang_m') }}">
                            </div>
                            <div class="space-y-2">
                                <label for="lebar_m"
                                    class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Width
                                    <span class="text-[8px] opacity-40 lowercase">(m)</span></label>
                                <input type="number" step="0.1" name="lebar_m" id="lebar_m" required
                                    class="form-input text-primary font-bold tabular-nums" placeholder="0.0"
                                    value="{{ old('lebar_m') }}">
                            </div>
                            <div class="space-y-2">
                                <label for="kedalaman_min_lws"
                                    class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Min
                                    Depth</label>
                                <input type="number" step="0.1" name="kedalaman_min_lws" id="kedalaman_min_lws"
                                    required class="form-input text-blue-600 font-bold tabular-nums bg-blue-50/20"
                                    value="{{ old('kedalaman_min_lws') }}">
                            </div>
                            <div class="space-y-2">
                                <label for="kedalaman_max_lws"
                                    class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Max
                                    Depth</label>
                                <input type="number" step="0.1" name="kedalaman_max_lws" id="kedalaman_max_lws"
                                    required class="form-input text-blue-600 font-bold tabular-nums bg-blue-50/20"
                                    value="{{ old('kedalaman_max_lws') }}">
                            </div>

                            <div class="col-span-2 space-y-2">
                                <label for="latitude"
                                    class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Geo -
                                    Latitude</label>
                                <input type="text" name="latitude" id="latitude" class="form-input font-mono"
                                    placeholder="-7.xxxx" value="{{ old('latitude') }}">
                            </div>
                            <div class="col-span-2 space-y-2">
                                <label for="longitude"
                                    class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Geo -
                                    Longitude</label>
                                <input type="text" name="longitude" id="longitude" class="form-input font-mono"
                                    placeholder="112.xxxx" value="{{ old('longitude') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Notes Area -->
                    <div class="layout-card overflow-hidden">
                        <div class="bg-muted/30 p-6 border-b border-border">
                            <h3 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] flex items-center">
                                <i class="fas fa-file-invoice mr-3 opacity-30"></i> Operational Directives
                            </h3>
                        </div>
                        <div class="p-8">
                            <textarea name="catatan_operasional" rows="4" class="form-input min-h-[120px] resize-none"
                                placeholder="Enter special instructions or operational constraints...">{{ old('catatan_operasional') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Sidebar Config -->
                <div class="lg:col-span-4 space-y-8">
                    <!-- Status Selection -->
                    <div class="layout-card p-8">
                        <h3 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] mb-6 flex items-center">
                            <i class="fas fa-broadcast-tower mr-3 text-primary/30"></i> Operational State
                        </h3>
                        <div class="space-y-2.5">
                            @foreach ($statusOptions as $option)
                                <label
                                    class="flex items-center gap-3 p-4 bg-muted/20 border border-border/50 rounded-xl cursor-pointer hover:bg-accent transition-all group">
                                    <input type="radio" name="status" value="{{ $option }}"
                                        class="w-4 h-4 text-primary focus:ring-0 border-border"
                                        {{ old('status', 'Tersedia') == $option ? 'checked' : '' }}>
                                    <span
                                        class="text-[10px] font-bold uppercase tracking-wider text-muted-foreground group-hover:text-primary transition-colors">{{ $option }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Facilities Selection -->
                    <div class="layout-card p-8">
                        <h3 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] mb-6 flex items-center">
                            <i class="fas fa-bolt-lightning mr-3 text-teal-600/30"></i> Support Grid
                        </h3>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach ($fasilitasOptions as $fasilitas)
                                <label
                                    class="flex items-center gap-3 p-3 bg-muted/10 rounded-lg cursor-pointer hover:bg-muted/30 transition-all border border-transparent hover:border-border">
                                    <input type="checkbox" name="fasilitas[]" value="{{ $fasilitas }}"
                                        class="w-4 h-4 rounded text-primary border-border focus:ring-0"
                                        {{ in_array($fasilitas, old('fasilitas', [])) ? 'checked' : '' }}>
                                    <span
                                        class="text-[10px] font-semibold uppercase tracking-tight text-muted-foreground">{{ $fasilitas }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit / Control -->
                    <div class="layout-card p-1 bg-primary shadow-2xl shadow-primary/30 border-none">
                        <div class="p-6 space-y-4">
                            <button type="submit"
                                class="w-full h-12 bg-white text-primary font-bold text-[11px] uppercase tracking-[0.2em] rounded-lg hover:shadow-lg active:scale-[0.98] transition-all">
                                Finalize Registration <i class="fas fa-save ml-3"></i>
                            </button>
                            <a href="{{ route('dermaga.index') }}"
                                class="block text-center text-[9px] font-bold text-white/40 uppercase tracking-[0.2em] hover:text-white transition-colors">Discard
                                Draft</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
