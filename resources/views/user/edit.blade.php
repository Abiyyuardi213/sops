@extends('layouts.app')

@section('title', '| Perbarui Pengguna')
@section('breadcrumb', 'Perbarui Pengguna')

@section('content')
    <div class="mb-8 flex items-center space-x-4 animate-fade-in">
        <a href="{{ route('user.index') }}"
            class="w-10 h-10 bg-white border border-gray-100 rounded-lg flex items-center justify-center text-gray-400 hover:text-blue-600 transition-all hover:shadow-sm">
            <i class="fas fa-chevron-left text-xs"></i>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Perbarui Data Akun</h2>
            <p class="text-gray-500 font-medium italic text-sm">Modifikasi profil dan hak akses personel</p>
        </div>
    </div>

    <div class="max-w-2xl mx-auto">
        <div class="layout-card overflow-hidden">
            <div
                class="bg-gradient-to-r from-navy-dark to-navy-light px-8 py-4 border-b border-gray-100 flex items-center justify-between italic">
                <div class="flex items-center space-x-3 text-white">
                    <i class="fas fa-user-edit text-lg opacity-80"></i>
                    <h3 class="font-semibold uppercase tracking-widest text-sm">Akun Personel : <span
                            class="bg-blue-500/20 px-2 py-0.5 rounded ml-2">{{ $user->name }}</span></h3>
                </div>
                <div class="bg-white/10 px-3 py-1 rounded-full border border-white/20 text-xs font-bold text-white uppercase tracking-widest group cursor-help"
                    title="ID: {{ $user->id }}">
                    <i class="far fa-clock mr-1 text-white/60"></i> Aktif Sejak : {{ $user->created_at->format('M Y') }}
                </div>
            </div>

            <form action="{{ route('user.update', $user->id) }}" method="POST" class="p-8 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="name"
                            class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                            Nama Lengkap <span class="text-red-500 ml-1 font-bold text-xs">*</span>
                        </label>
                        <input type="text" name="name" id="name" required
                            class="block w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all transition-all @error('name') border-red-500 @enderror"
                            value="{{ old('name', $user->name) }}">
                    </div>

                    <div class="space-y-2">
                        <label for="email"
                            class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                            Alamat Email <span class="text-red-500 ml-1 font-bold text-xs">*</span>
                        </label>
                        <input type="email" name="email" id="email" required
                            class="block w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all transition-all @error('email') border-red-500 @enderror"
                            value="{{ old('email', $user->email) }}">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="role_id"
                            class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                            Role / Hak Akses <span class="text-red-500 ml-1 font-bold text-xs">*</span>
                        </label>
                        <select name="role_id" id="role_id" required
                            class="block w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all transition-all @error('role_id') border-red-500 @enderror">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                    {{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="password"
                            class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                            Perbarui Kata Sandi
                        </label>
                        <input type="password" name="password" id="password"
                            class="block w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all transition-all @error('password') border-red-500 @enderror"
                            placeholder="Kosongkan jika tidak diubah...">
                        <p class="text-[11px] text-gray-400 italic">Lewati jika Anda tetap ingin menggunakan kata sandi
                            lama.</p>
                    </div>
                </div>

                <div class="space-y-2 pt-2">
                    <label class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                        Status Akses Sistem
                    </label>
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="status" value="1" class="w-4 h-4 text-blue-600"
                                {{ old('status', $user->status) == '1' ? 'checked' : '' }}>
                            <span
                                class="ml-2 text-sm text-gray-700 font-semibold transition-colors group-hover:text-blue-600 uppercase tracking-widest">Aktif</span>
                        </label>
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="status" value="0" class="w-4 h-4 text-red-600"
                                {{ old('status', $user->status) == '0' ? 'checked' : '' }}>
                            <span
                                class="ml-2 text-sm text-gray-700 font-semibold transition-colors group-hover:text-red-600 uppercase tracking-widest">Terblokir</span>
                        </label>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                    <a href="{{ route('user.index') }}"
                        class="px-6 py-2.5 text-gray-400 bg-gray-50 hover:bg-gray-100 rounded-lg text-sm font-bold transition-all transition-all transition-all">
                        Batalkan
                    </a>
                    <button type="submit"
                        class="bg-navy-dark text-white hover:bg-navy-light px-10 py-2.5 rounded-lg text-sm font-bold shadow-lg shadow-navy-dark/10 active:scale-95 transition-all transition-all transition-all">
                        SIMPAN PERUBAHAN <i class="fas fa-check-circle ml-2 text-xs"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
