<div id="logoutModal" class="fixed inset-0 z-[100] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Overlay -->
        <div id="logoutOverlay" class="fixed inset-0 bg-primary/20 backdrop-blur-md transition-opacity opacity-0"
            aria-hidden="true" onclick="hideLogoutModal()"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!-- Modal Panel -->
        <div id="logoutPanel"
            class="inline-block align-bottom bg-background border border-border rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full scale-95 opacity-0">
            <div class="p-8">
                <div class="flex flex-col items-center text-center">
                    <div
                        class="w-16 h-16 rounded-2xl bg-destructive/5 border border-destructive/10 flex items-center justify-center mb-6">
                        <i class="fas fa-shield-halved text-destructive text-2xl animate-pulse"></i>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-primary tracking-tight uppercase" id="modal-title">
                            Terminate Session
                        </h3>
                        <p class="text-xs font-bold text-muted-foreground uppercase tracking-wider opacity-60">
                            You are about to disconnect from the secure command layer. Unsaved operational data may be
                            lost.
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-muted/30 border-t border-border flex flex-col sm:flex-row-reverse gap-3">
                <form action="{{ route('logout') }}" method="POST" id="logout-form" class="flex-1">
                    @csrf
                    <button type="submit"
                        class="w-full h-12 bg-destructive text-white rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] shadow-lg shadow-destructive/20 hover:bg-destructive/90 active:scale-[0.98] transition-all">
                        Confirm Termination <i class="fas fa-power-off ml-2 opacity-50"></i>
                    </button>
                </form>
                <button type="button" onclick="hideLogoutModal()"
                    class="flex-1 h-12 bg-background border border-border text-[10px] font-bold text-muted-foreground uppercase tracking-[0.2em] rounded-xl hover:bg-muted/50 transition-all">
                    Abort <i class="fas fa-xmark ml-2 opacity-30"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function showLogoutModal() {
        const modal = document.getElementById('logoutModal');
        const overlay = document.getElementById('logoutOverlay');
        const panel = document.getElementById('logoutPanel');

        modal.classList.remove('hidden');
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            panel.classList.remove('scale-95', 'opacity-0');
            panel.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function hideLogoutModal() {
        const overlay = document.getElementById('logoutOverlay');
        const panel = document.getElementById('logoutPanel');

        overlay.classList.add('opacity-0');
        panel.classList.add('scale-95', 'opacity-0');
        panel.classList.remove('scale-100', 'opacity-100');

        setTimeout(() => {
            document.getElementById('logoutModal').classList.add('hidden');
        }, 300);
    }
</script>
