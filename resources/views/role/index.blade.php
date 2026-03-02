@extends('layouts.app')

@section('title', '| Manajemen Role')
@section('breadcrumb', 'Manajemen Role')

@section('content')
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Daftar Role</h2>
            <p class="text-gray-500 font-medium">Pengelolaan hak akses sistem operasional</p>
        </div>
        <a href="{{ route('role.create') }}"
            class="btn-primary flex items-center px-5 py-2.5 rounded-lg shadow-sm font-semibold transition-all hover:shadow-md">
            <i class="fas fa-plus mr-2 text-sm"></i>
            Tambah Role Baru
        </a>
    </div>

    <div class="layout-card overflow-hidden">
        <div
            class="bg-white border-b border-gray-100 p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="relative flex-1 md:max-w-md">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" placeholder="Cari nama role..."
                    class="block w-full pl-10 pr-4 py-2 bg-gray-50/50 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all"
                    id="roleSearch">
            </div>
            <div class="flex items-center space-x-3">
                <button class="bg-gray-100/80 p-2.5 rounded-lg text-gray-600 hover:bg-gray-200 transition-colors"
                    title="Download Report">
                    <i class="fas fa-file-pdf"></i>
                </button>
                <button class="bg-gray-100/80 p-2.5 rounded-lg text-gray-600 hover:bg-gray-200 transition-colors"
                    title="Filter Settings">
                    <i class="fas fa-sliders-h"></i>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse" id="roleTable">
                <thead>
                    <tr class="bg-[#001f3f] text-white">
                        <th
                            class="px-6 py-4 border-b border-white/5 font-semibold uppercase tracking-wider text-center w-16">
                            No</th>
                        <th class="px-6 py-4 border-b border-white/5 font-semibold uppercase tracking-wider">Nama Role</th>
                        <th class="px-6 py-4 border-b border-white/5 font-semibold uppercase tracking-wider">Deskripsi</th>
                        <th
                            class="px-6 py-4 border-b border-white/5 font-semibold uppercase tracking-wider text-center w-32">
                            Status</th>
                        <th
                            class="px-6 py-4 border-b border-white/5 font-semibold uppercase tracking-wider text-center w-40">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse($roles as $key => $role)
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-gray-500 border-r border-gray-50">
                                {{ $key + 1 }}</td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-gray-900">{{ $role->role_name }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-600 line-clamp-1 max-w-xs" title="{{ $role->role_description }}">
                                {{ $role->role_description ?: '-' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button onclick="toggleStatus('{{ $role->id }}', this)"
                                    class="status-badge {{ $role->role_status ? 'status-active' : 'status-inactive' }} inline-flex items-center space-x-1.5 transition-all active:scale-95"
                                    data-status="{{ $role->role_status }}">
                                    <span
                                        class="w-1.5 h-1.5 rounded-full {{ $role->role_status ? 'bg-green-600' : 'bg-red-600' }}"></span>
                                    <span>{{ $role->role_status ? 'Aktif' : 'Nonaktif' }}</span>
                                </button>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('role.edit', $role->id) }}"
                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors border border-transparent hover:border-blue-100"
                                        title="Edit Role">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus role ini?');"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors border border-transparent hover:border-red-100"
                                            title="Hapus Role">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4 border border-gray-100">
                                        <i class="fas fa-folder-open text-gray-300 text-3xl"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-600">Belum ada role tersedia</h3>
                                    <p class="text-gray-400 mt-1">Silakan tambahkan role baru untuk memulai.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('roleSearch').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll('#roleTable tbody tr');

            rows.forEach(row => {
                let roleName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                let roleDesc = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                if (roleName.includes(searchValue) || roleDesc.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        async function toggleStatus(id, btn) {
            if (!confirm('Ubah status role?')) return;

            btn.disabled = true;
            btn.classList.add('opacity-50');

            try {
                const response = await fetch(`/role/${id}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                const result = await response.json();

                if (result.success) {
                    const currentStatus = btn.getAttribute('data-status') === '1';
                    const newStatus = !currentStatus;

                    btn.setAttribute('data-status', newStatus ? '1' : '0');
                    btn.className =
                        `status-badge ${newStatus ? 'status-active' : 'status-inactive'} inline-flex items-center space-x-1.5 transition-all active:scale-95`;
                    btn.querySelector('span:first-child').className =
                        `w-1.5 h-1.5 rounded-full ${newStatus ? 'bg-green-600' : 'bg-red-600'}`;
                    btn.querySelector('span:last-child').textContent = newStatus ? 'Aktif' : 'Nonaktif';
                } else {
                    alert(result.message || 'Gagal mengubah status');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan pada server');
            } finally {
                btn.disabled = false;
                btn.classList.remove('opacity-50');
            }
        }
    </script>
@endpush
