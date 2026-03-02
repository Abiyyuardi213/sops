@extends('layouts.admin')

@section('title', '| Registrasi Role')
@section('breadcrumb', 'Daftarkan Peran Baru')

@section('content')
    <div class="space-y-8 animate-fade-in-down">
        <!-- Header Area -->
        <div class="flex items-center space-x-5">
            <a href="{{ route('role.index') }}"
                class="group w-10 h-10 bg-background rounded-md flex items-center justify-center border border-input hover:border-primary/50 transition-all shadow-sm">
                <i class="fas fa-chevron-left text-muted-foreground group-hover:text-primary transition-colors text-xs"></i>
            </a>
            <div>
                <div
                    class="flex items-center space-x-3 text-[10px] font-bold uppercase tracking-[0.2em] text-primary/50 mb-1">
                    <i class="fas fa-shield-halved text-[8px]"></i>
                    <span>Manajemen Akses</span>
                </div>
                <h2 class="text-3xl font-bold text-primary tracking-tight">Buat Definisi Role Baru</h2>
            </div>
        </div>

        <div class="max-w-3xl">
            <form action="{{ route('role.store') }}" method="POST" class="space-y-8">
                @csrf

                <div class="layout-card overflow-hidden">
                    <div class="bg-muted/30 p-6 border-b border-border">
                        <h3 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] flex items-center">
                            <i class="fas fa-file-signature mr-3 opacity-30"></i> Definisi Keamanan
                        </h3>
                    </div>

                    <div class="p-8 space-y-8">
                        <div class="space-y-2">
                            <label for="role_name"
                                class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70 flex items-center">
                                Identitas Peran <span class="text-destructive ml-1">*</span>
                            </label>
                            <div class="relative group">
                                <span
                                    class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-muted-foreground/40 group-focus-within:text-primary transition-colors">
                                    <i class="fas fa-id-badge text-xs"></i>
                                </span>
                                <input type="text" name="role_name" id="role_name"
                                    class="form-input pl-10 h-12 bg-background border-border hover:border-primary/30 transition-all text-xs font-bold uppercase tracking-widest placeholder:text-muted-foreground/30"
                                    placeholder="e.g. OPERATION_OFFICER_REAR" value="{{ old('role_name') }}" required>
                            </div>
                            @error('role_name')
                                <p class="text-destructive text-[10px] font-bold mt-2 uppercase tracking-tighter italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="role_description"
                                class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Lingkup
                                Fungsional</label>
                            <textarea name="role_description" id="role_description" rows="4"
                                class="form-input min-h-[120px] resize-none bg-background border-border hover:border-primary/30 transition-all text-sm font-medium leading-relaxed placeholder:text-muted-foreground/30"
                                placeholder="Tentukan lingkup yurisdiksi khusus dan otorisasi operasional untuk peran ini...">{{ old('role_description') }}</textarea>
                            @error('role_description')
                                <p class="text-destructive text-[10px] font-bold mt-2 uppercase tracking-tighter italic">
                                    {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-4 pt-4 border-t border-border">
                            <label class="text-[10px] font-bold uppercase tracking-widest text-muted-foreground/70">Status
                                Otorisasi</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <label
                                    class="flex items-center gap-4 p-5 bg-muted/20 border-2 border-transparent has-[:checked]:border-primary has-[:checked]:bg-primary/5 rounded-2xl cursor-pointer transition-all group">
                                    <input type="radio" name="role_status" value="1"
                                        class="w-4 h-4 text-primary focus:ring-0"
                                        {{ old('role_status', '1') == '1' ? 'checked' : '' }}>
                                    <div class="space-y-1">
                                        <span
                                            class="block text-[11px] font-bold text-primary uppercase tracking-widest">Aktif
                                            & Diizinkan</span>
                                        <span
                                            class="block text-[9px] text-muted-foreground font-bold uppercase tracking-tight opacity-50">Immediate
                                            system availability</span>
                                    </div>
                                </label>

                                <label
                                    class="flex items-center gap-4 p-5 bg-muted/20 border-2 border-transparent has-[:checked]:border-destructive has-[:checked]:bg-destructive/5 rounded-2xl cursor-pointer transition-all group">
                                    <input type="radio" name="role_status" value="0"
                                        class="w-4 h-4 text-destructive focus:ring-0"
                                        {{ old('role_status') == '0' ? 'checked' : '' }}>
                                    <div class="space-y-1">
                                        <span
                                            class="block text-[11px] font-bold text-destructive uppercase tracking-widest">Ditangguhkan
                                            / Draf</span>
                                        <span
                                            class="block text-[9px] text-muted-foreground font-bold uppercase tracking-tight opacity-50">Disable
                                            permissions globally</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 bg-muted/30 border-t border-border flex items-center justify-end gap-4">
                        <a href="{{ route('role.index') }}"
                            class="px-6 py-2.5 text-[10px] font-bold text-muted-foreground uppercase tracking-widest hover:text-primary transition-colors">Abort
                            Changes</a>
                        <button type="submit"
                            class="btn-primary h-12 px-10 rounded-lg shadow-xl shadow-primary/20 active:scale-[0.98] transition-all">
                            Simpan Definisi <i class="fas fa-save ml-3"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
