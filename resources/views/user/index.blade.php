@extends('layouts.admin')

@section('title', '| Manajemen Pengguna')
@section('breadcrumb', 'Registri Personel')

@section('content')
    <div class="space-y-8 animate-fade-in-down">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div
                    class="flex items-center space-x-3 text-[10px] font-bold uppercase tracking-[0.2em] text-primary/50 mb-1">
                    <i class="fas fa-users-gear text-[8px]"></i>
                    <span>Manajemen Sumber Daya Manusia</span>
                </div>
                <h2 class="text-3xl font-bold text-primary tracking-tight">Manajemen Personel</h2>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('user.create') }}" class="btn-primary">
                    <i class="fas fa-user-plus mr-2 text-[10px]"></i> Siapkan Akun Baru
                </a>
            </div>
        </div>

        <!-- Data Search & Filter -->
        <div class="layout-card overflow-hidden">
            <div
                class="bg-muted/10 p-6 border-b border-border flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="relative flex-1 md:max-w-md group">
                    <span
                        class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-muted-foreground/40 group-focus-within:text-primary transition-colors">
                        <i class="fas fa-search text-xs"></i>
                    </span>
                    <input type="text" placeholder="Cari identitas..."
                        class="form-input pl-10 h-10 bg-background border-border hover:border-primary/30 transition-all text-xs font-bold uppercase tracking-widest placeholder:text-muted-foreground/30"
                        id="userSearch">
                </div>
                <div class="flex items-center gap-2">
                    <p class="text-[9px] font-bold text-muted-foreground uppercase tracking-widest leading-none">Agen
                        Terdaftar: {{ $users->count() }}</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse" id="userTable">
                    <thead>
                        <tr class="bg-muted/30 border-b border-border">
                            <th
                                class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70 text-center w-16">
                                #</th>
                            <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70">
                                Identitas Subjek</th>
                            <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70">
                                Tingkat Hak Akses</th>
                            <th
                                class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70 text-center w-32">
                                Status</th>
                            <th
                                class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-muted-foreground/70 text-center w-40">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border bg-white">
                        @forelse($users as $key => $user)
                            <tr class="group hover:bg-muted/20 transition-all duration-200">
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="text-[10px] font-bold text-muted-foreground/40">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-9 h-9 rounded-lg bg-primary/5 border border-primary/10 flex items-center justify-center text-primary font-bold text-xs mr-4 group-hover:bg-primary group-hover:text-white transition-all shadow-sm">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div class="flex flex-col">
                                            <span
                                                class="text-sm font-bold text-primary leading-tight uppercase tracking-tight">{{ $user->name }}</span>
                                            <span
                                                class="text-[9px] text-muted-foreground font-bold italic mt-0.5 opacity-60">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2 py-1 bg-muted rounded text-[10px] font-bold text-primary border border-border uppercase tracking-widest">
                                        <i class="fas fa-key text-[8px] mr-2 opacity-30"></i>
                                        {{ $user->role ? $user->role->role_name : 'DICABUT' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button onclick="toggleStatus('{{ $user->id }}', this)"
                                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md border text-[9px] font-bold uppercase tracking-widest transition-all active:scale-95 {{ $user->status ? 'bg-green-500/5 text-green-700 border-green-500/20' : 'bg-destructive/5 text-destructive border-destructive/20' }}"
                                        data-status="{{ $user->status }}">
                                        <span
                                            class="w-1.5 h-1.5 rounded-full {{ $user->status ? 'bg-green-600' : 'bg-destructive' }} animate-pulse"></span>
                                        <span>{{ $user->status ? 'Terverifikasi' : 'Ditandai' }}</span>
                                    </button>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="w-8 h-8 rounded-md border border-border flex items-center justify-center text-muted-foreground hover:bg-primary hover:text-white hover:border-primary transition-all shadow-sm"
                                            title="Modify Credentials">
                                            <i class="fas fa-pen text-[10px]"></i>
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus akun ini segera?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-8 h-8 rounded-md border border-border flex items-center justify-center text-muted-foreground hover:bg-destructive hover:text-white hover:border-destructive transition-all shadow-sm"
                                                title="Terminate Account">
                                                <i class="fas fa-user-slash text-[10px]"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center opacity-30 select-none">
                                        <i class="fas fa-users-slash text-4xl mb-4"></i>
                                        <p class="text-[10px] font-bold uppercase tracking-[0.3em]">Tidak ada data personel
                                            ditemukan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('userSearch').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll('#userTable tbody tr');

            rows.forEach(row => {
                let name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                let email = row.querySelector('td:nth-child(2) span:last-child').textContent.toLowerCase();
                if (name.includes(searchValue) || email.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        async function toggleStatus(id, btn) {
            if (!confirm('Ubah status akses pengguna?')) return;

            btn.disabled = true;
            btn.classList.add('opacity-50');

            try {
                const response = await fetch(`/user/${id}/toggle-status`, {
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
                        `inline-flex items-center gap-2 px-3 py-1.5 rounded-md border text-[9px] font-bold uppercase tracking-widest transition-all active:scale-95 ${newStatus ? 'bg-green-500/5 text-green-700 border-green-500/20' : 'bg-destructive/5 text-destructive border-destructive/20'}`;
                    btn.querySelector('span:first-child').className =
                        `w-1.5 h-1.5 rounded-full ${newStatus ? 'bg-green-600' : 'bg-destructive'} animate-pulse`;
                    btn.querySelector('span:last-child').textContent = newStatus ? 'Terverifikasi' : 'Ditandai';
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
