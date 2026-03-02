@extends('layouts.admin')

@section('title', '| Registrasi Personel')
@section('breadcrumb', 'Penyediaan Akun')

@section('content')
    <div class="space-y-8 animate-fade-in-down">
        <!-- Header Area -->
        <div class="flex items-center space-x-5">
            <a href="{{ route('user.index') }}"
                class="group w-10 h-10 bg-background rounded-md flex items-center justify-center border border-input hover:border-primary/50 transition-all shadow-sm">
                <i class="fas fa-chevron-left text-muted-foreground group-hover:text-primary transition-colors text-xs"></i>
            </a>
            <div>
                <div
                    class="flex items-center space-x-3 text-[10px] font-bold uppercase tracking-[0.2em] text-primary/50 mb-1">
                    <i class="fas fa-user-plus text-[8px]"></i>
                    <span>Layanan Identitas</span>
                </div>
                <h2 class="text-3xl font-bold text-primary tracking-tight">Registrasi Akun Baru</h2>
            </div>
        </div>

        <div class="max-w-4xl">
            <form action="{{ route('user.store') }}" method="POST" class="space-y-8">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <!-- Primary Information -->
                    <div class="lg:col-span-8 space-y-8">
                        <div class="layout-card overflow-hidden">
                            <div class="bg-muted/30 p-6 border-b border-border">
                                <h3 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] flex items-center">
                                    <i class="fas fa-fingerprint mr-3 opacity-30"></i> Rincian Subjek
                                </h3>
                            </div>

                            <div class="p-8 space-y-6">
                                <div class="space-y-2">
                                    <label for="name"
                                        class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Legal
                                        Lengkap <span class="text-destructive ml-1">*</span></label>
                                    <div class="relative group">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-muted-foreground/40 group-focus-within:text-primary transition-colors">
                                            <i class="fas fa-id-card text-xs"></i>
                                        </span>
                                        <input type="text" name="name" id="name" required
                                            class="form-input pl-10 h-12 bg-background border-border hover:border-primary/30 transition-all text-sm font-bold placeholder:text-muted-foreground/30"
                                            placeholder="e.g. Admiral Andi Wijaya" value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                        <p
                                            class="text-destructive text-[10px] font-bold mt-1 uppercase tracking-tighter italic">
                                            {{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="email"
                                        class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Official
                                        Resmi (Email) <span class="text-destructive ml-1">*</span></label>
                                    <div class="relative group">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-muted-foreground/40 group-focus-within:text-primary transition-colors">
                                            <i class="fas fa-envelope text-xs"></i>
                                        </span>
                                        <input type="email" name="email" id="email" required
                                            class="form-input pl-10 h-12 bg-background border-border hover:border-primary/30 transition-all text-sm font-bold placeholder:text-muted-foreground/30 lowercase"
                                            placeholder="endpoint@sops.go.id" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                        <p
                                            class="text-destructive text-[10px] font-bold mt-1 uppercase tracking-tighter italic">
                                            {{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-border">
                                    <div class="space-y-2">
                                        <label for="role_id"
                                            class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Authorization
                                            Tingkat Otorisasi <span class="text-destructive ml-1">*</span></label>
                                        <select name="role_id" id="role_id" required
                                            class="form-input h-12 bg-background border-border hover:border-primary/30 transition-all text-[11px] font-bold uppercase tracking-widest appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22currentColor%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.2em] bg-[right_0.75rem_center] bg-no-repeat">
                                            <option value="">PILIH TINGKAT AKSES</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                                    {{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="password"
                                            class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Security
                                            Token Keamanan <span class="text-destructive ml-1">*</span></label>
                                        <div class="relative group">
                                            <span
                                                class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-muted-foreground/40 group-focus-within:text-primary transition-colors">
                                                <i class="fas fa-lock text-xs"></i>
                                            </span>
                                            <input type="password" name="password" id="password" required
                                                class="form-input pl-10 h-12 bg-background border-border hover:border-primary/30 transition-all text-xs font-bold tracking-widest"
                                                placeholder="MIN 8 KARAKTER">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Control Panel -->
                    <div class="lg:col-span-4 space-y-8">
                        <div class="layout-card p-8">
                            <h3
                                class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] mb-6 flex items-center">
                                <i class="fas fa-shield-halved mr-3 text-primary/30"></i> Status Verifikasi
                            </h3>
                            <div class="space-y-2.5">
                                <label
                                    class="flex items-center gap-4 p-4 bg-muted/20 border-2 border-transparent has-[:checked]:border-green-500 has-[:checked]:bg-green-500/5 rounded-2xl cursor-pointer transition-all group">
                                    <input type="radio" name="status" value="1"
                                        class="w-4 h-4 text-green-600 focus:ring-0"
                                        {{ old('status', '1') == '1' ? 'checked' : '' }}>
                                    <div class="space-y-1">
                                        <span
                                            class="block text-[11px] font-bold text-green-700 uppercase tracking-widest">Terverifikasi</span>
                                        <span
                                            class="block text-[9px] text-muted-foreground font-bold uppercase tracking-tight opacity-50">Akses
                                            Diizinkan</span>
                                    </div>
                                </label>

                                <label
                                    class="flex items-center gap-4 p-4 bg-muted/20 border-2 border-transparent has-[:checked]:border-destructive has-[:checked]:bg-destructive/5 rounded-2xl cursor-pointer transition-all group">
                                    <input type="radio" name="status" value="0"
                                        class="w-4 h-4 text-destructive focus:ring-0"
                                        {{ old('status') == '0' ? 'checked' : '' }}>
                                    <div class="space-y-1">
                                        <span
                                            class="block text-[11px] font-bold text-destructive uppercase tracking-widest">Ditandai</span>
                                        <span
                                            class="block text-[9px] text-muted-foreground font-bold uppercase tracking-tight opacity-50">Cabut
                                            Izin</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="layout-card p-1 bg-primary shadow-2xl shadow-primary/30 border-none">
                            <div class="p-6 space-y-4">
                                <button type="submit"
                                    class="w-full h-12 bg-white text-primary font-bold text-[11px] uppercase tracking-[0.2em] rounded-lg hover:shadow-lg active:scale-[0.98] transition-all">
                                    Simpan Personel <i class="fas fa-save ml-3"></i>
                                </button>
                                <a href="{{ route('user.index') }}"
                                    class="block text-center text-[9px] font-bold text-white/40 uppercase tracking-[0.2em] hover:text-white transition-colors">Discard
                                    Application</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
