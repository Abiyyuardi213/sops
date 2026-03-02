@extends('layouts.app')

@section('title', '| Tambah Role Baru')
@section('breadcrumb', 'Tambah Role Baru')

@section('content')
    <div class="mb-8 flex items-center space-x-4 animate-fade-in">
        <a href="{{ route('role.index') }}"
            class="w-10 h-10 bg-white border border-gray-100 rounded-lg flex items-center justify-center text-gray-400 hover:text-blue-600 hover:border-blue-100 transition-all hover:shadow-sm">
            <i class="fas fa-chevron-left text-xs"></i>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Form Tambah Role</h2>
            <p class="text-gray-500 font-medium italic">Sistem Operasional Komando Armada II</p>
        </div>
    </div>

    <div class="max-w-2xl mx-auto">
        <div class="layout-card overflow-hidden">
            <div class="bg-gradient-to-r from-navy-dark to-navy-light px-8 py-4 border-b border-gray-100">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-shield-alt text-white/80 text-lg"></i>
                    <h3 class="text-white font-semibold uppercase tracking-widest text-sm">Informasi Role Baru</h3>
                </div>
            </div>

            <form action="{{ route('role.store') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="role_name"
                        class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                        Nama Role <span class="text-red-500 ml-1 font-bold">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-300">
                            <i class="fas fa-user-tag text-xs"></i>
                        </span>
                        <input type="text" name="role_name" id="role_name"
                            class="block w-full pl-10 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all transition-all @error('role_name') border-red-500 @enderror"
                            placeholder="Contoh: Staff Operasi I, Komandan KRI, dll." value="{{ old('role_name') }}"
                            required>
                    </div>
                    @error('role_name')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="role_description"
                        class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                        Deskripsi Role
                    </label>
                    <div class="relative">
                        <span class="absolute top-3 inset-y-0 left-0 pl-3 flex items-start text-gray-300">
                            <i class="fas fa-align-left text-xs"></i>
                        </span>
                        <textarea name="role_description" id="role_description" rows="4"
                            class="block w-full pl-10 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all transition-all @error('role_description') border-red-500 @enderror"
                            placeholder="Penjelasan wewenang dan cakupan akses role ini...">{{ old('role_description') }}</textarea>
                    </div>
                    @error('role_description')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-4 pt-2">
                    <label class="text-sm font-bold text-gray-600 flex items-center uppercase tracking-wide">
                        Status Role
                    </label>
                    <div class="grid grid-cols-2 gap-4">
                        <label
                            class="relative flex items-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50 transition-all peer-checked:border-blue-500 peer-checked:bg-blue-50">
                            <input type="radio" name="role_status" value="1"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                {{ old('role_status', '1') == '1' ? 'checked' : '' }}>
                            <div class="ml-3">
                                <span class="block text-sm font-bold text-gray-900 leading-none">Aktif</span>
                                <span class="text-xs text-gray-500 font-medium">Bisa digunakan langsung</span>
                            </div>
                        </label>
                        <label
                            class="relative flex items-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50 transition-all peer-checked:border-red-500 peer-checked:bg-red-50">
                            <input type="radio" name="role_status" value="0"
                                class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500"
                                {{ old('role_status') == '0' ? 'checked' : '' }}>
                            <div class="ml-3">
                                <span class="block text-sm font-bold text-gray-900 leading-none">Nonaktif</span>
                                <span class="text-xs text-gray-500 font-medium">Ditangguhkan sementera</span>
                            </div>
                        </label>
                    </div>
                    @error('role_status')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                    <a href="{{ route('role.index') }}"
                        class="px-6 py-2.5 text-gray-500 bg-gray-100/50 hover:bg-gray-100 rounded-lg text-sm font-bold transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="btn-primary px-8 py-2.5 rounded-lg text-sm font-bold shadow-lg shadow-blue-500/20 active:scale-95 transition-all">
                        SIMPAN DATA <i class="fas fa-save ml-2 text-xs"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
