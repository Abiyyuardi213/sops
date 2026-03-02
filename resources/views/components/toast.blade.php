<div id="toast-container" class="fixed top-5 right-5 z-[100] flex flex-col space-y-3 pointer-events-none">
    @if (session('success'))
        <div class="toast-item pointer-events-auto flex items-center p-4 min-w-[320px] bg-white rounded-2xl shadow-2xl border-l-4 border-green-500 transform transition-all duration-500 translate-x-full opacity-0"
            data-type="success">
            <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-green-50 rounded-xl mr-4">
                <i class="fas fa-check-circle text-green-500 text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Berhasil</p>
                <p class="text-sm font-semibold text-gray-700">{{ session('success') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="ml-4 text-gray-300 hover:text-gray-500">
                <i class="fas fa-times text-xs"></i>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="toast-item pointer-events-auto flex items-center p-4 min-w-[320px] bg-white rounded-2xl shadow-2xl border-l-4 border-red-500 transform transition-all duration-500 translate-x-full opacity-0"
            data-type="error">
            <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-red-50 rounded-xl mr-4">
                <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Kesalahan</p>
                <p class="text-sm font-semibold text-gray-700">{{ session('error') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="ml-4 text-gray-300 hover:text-gray-500">
                <i class="fas fa-times text-xs"></i>
            </button>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toasts = document.querySelectorAll('.toast-item');
        toasts.forEach((toast, index) => {
            setTimeout(() => {
                toast.classList.remove('translate-x-full', 'opacity-0');
                toast.classList.add('translate-x-0', 'opacity-100');
            }, 100 + (index * 200));

            // Auto Close after 5 seconds
            setTimeout(() => {
                toast.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }, 5000);
        });
    });
</script>
