@extends('layouts.app')

@section('title', '| Registrasi Pengguna')
@section('breadcrumb', 'Tambah Pengguna Baru')

@section('content')
    <div class="mb-8 flex items-center space-x-4">
        <a href="{{ route('user.index') }}"
            class="w-10 h-10 bg-white border border-gray-100 rounded-lg flex items-center justify-center text-gray-400 hover:text-blue-600 transition-all hover:shadow-sm">
            <i class="fas fa-chevron-left text-xs"></i>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Registrasi Personel Baru</h2>
            <p class="text-gray-500 font-medium italic text-sm">Formulir pendaftaran akun akses SOPS</p>
        </div>
    </div>

    <div class="max-w-2xl mx-auto">
        <div class="layout-card overflow-hidden">
            <div class="bg-gradient-to-r from-navy-dark to-navy-light px-8 py-4 border-b border-gray-100 italic">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-user-shield text-white/80 text-lg"></i>
                    <h3 class="text-white font-semibold uppercase tracking-widest text-sm">Data Identitas Personel</h3>
                </div>
            </div>

            <form action="{{ route('user.store') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div class="space-y-4">
                    <div class="space-y-2">
                        <label for="name"
                            class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                            Nama Lengkap <span class="text-red-500 ml-1 font-bold text-xs">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-300">
                                <i class="fas fa-id-card text-xs"></i>
                            </span>
                            <input type="text" name="name" id="name" required
                                class="block w-full pl-10 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all transition-all @error('name') border-red-500 @enderror"
                                value="{{ old('name') }}" placeholder="Masukkan nama lengkap personel...">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="email"
                            class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                            Alamat Email <span class="text-red-500 ml-1 font-bold text-xs">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-300">
                                <i class="fas fa-at text-xs"></i>
                            </span>
                            <input type="email" name="email" id="email" required
                                class="block w-full pl-10 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all transition-all @error('email') border-red-500 @enderror"
                                value="{{ old('email') }}" placeholder="contoh@sops.go.id">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="role_id"
                                class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                                Pilih Role <span class="text-red-500 ml-1 font-bold text-xs">*</span>
                            </label>
                            <select name="role_id" id="role_id" required
                                class="block w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all transition-all @error('role_id') border-red-500 @enderror">
                                <option value="">-- Pilih Akses --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="password"
                                class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                                Kata Sandi <span class="text-red-500 ml-1 font-bold text-xs">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-300">
                                    <i class="fas fa-key text-xs"></i>
                                </span>
                                <input type="password" name="password" id="password" required
                                    class="block w-full pl-10 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all transition-all @error('password') border-red-500 @enderror"
                                    placeholder="Minimal 8 karakter...">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2 pt-2">
                        <label class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                            Status Akun
                        </label>
                        <div class="flex items-center space-x-6">
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="status" value="1" class="w-4 h-4 text-blue-600"
                                    {{ old('status', '1') == '1' ? 'checked' : '' }}>
                                <span
                                    class="ml-2 text-sm text-gray-700 font-semibold transition-colors group-hover:text-blue-600">AKTIF</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="status" value="0" class="w-4 h-4 text-red-600"
                                    {{ old('status') == '0' ? 'checked' : '' }}>
                                <span
                                    class="ml-2 text-sm text-gray-700 font-semibold transition-colors group-hover:text-red-600">TERBLOKIR</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                    <a href="{{ route('user.index') }}"
                        class="px-6 py-2.5 text-gray-400 bg-gray-50 hover:bg-gray-100 rounded-lg text-sm font-bold transition-all transition-all">
                        Batalkan
                    </a>
                    <button type="submit"
                        class="btn-primary px-10 py-2.5 rounded-lg text-sm font-bold shadow-lg shadow-blue-500/20 active:scale-95 transition-all transition-all flex items-center">
                        <i class="fas fa-save mr-2"></i> REGISTRASI DATA
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
