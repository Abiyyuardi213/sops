<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Operasional - TNI AL | Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('image/koarmada2.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --navy-dark: #001f3f;
            --navy-primary: #003366;
            --bg-gray: #f4f7f6;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-gray);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .login-card {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .btn-navy {
            background-color: var(--navy-dark);
            color: white;
            transition: all 0.3s;
        }

        .btn-navy:hover {
            background-color: var(--navy-primary);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 31, 63, 0.3);
        }

        .input-focus:focus {
            border-color: var(--navy-primary);
            ring-color: rgba(0, 51, 102, 0.1);
        }
    </style>
</head>

<body>
    <div class="login-card animate-fade-in-down">
        <!-- Logo Header -->
        <div class="p-8 text-center relative overflow-hidden">
            <div class="relative z-10">
                <img src="{{ asset('image/koarmada2.png') }}" alt="Logo Koarmada II"
                    class="w-24 h-24 mx-auto mb-4 object-contain">
                <h1 class="text-2xl font-bold tracking-tight text-navy-dark">SOPS ARMADA II</h1>
                <p class="text-navy-primary/70 text-[10px] font-bold uppercase tracking-widest mt-1">Sistem Operasional
                    Kapal
                    Perang</p>
            </div>
        </div>

        <!-- Form Body -->
        <div class="p-8">
            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <div class="space-y-1.5">
                    <label for="email" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Alamat
                        Email</label>
                    <div class="relative group">
                        <span
                            class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-300 group-focus-within:text-navy-primary transition-colors">
                            <i class="fas fa-envelope text-sm"></i>
                        </span>
                        <input type="email" name="email" id="email" required
                            class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-navy-primary/10 focus:border-navy-primary transition-all"
                            placeholder="email@sops.go.id">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <div class="flex justify-between items-center ml-1">
                        <label for="password" class="text-xs font-bold text-gray-400 uppercase tracking-widest">Kata
                            Sandi</label>
                        <a href="#"
                            class="text-[10px] font-bold text-navy-primary hover:underline uppercase tracking-widest">Lupa?</a>
                    </div>
                    <div class="relative group">
                        <span
                            class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-300 group-focus-within:text-navy-primary transition-colors">
                            <i class="fas fa-lock text-sm"></i>
                        </span>
                        <input type="password" name="password" id="password" required
                            class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-navy-primary/10 focus:border-navy-primary transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center space-x-2 ml-1">
                    <input type="checkbox" name="remember" id="remember"
                        class="w-4 h-4 rounded border-gray-300 text-navy-primary focus:ring-navy-primary">
                    <label for="remember"
                        class="text-xs font-bold text-gray-500 uppercase tracking-widest cursor-pointer hover:text-gray-700">Ingat
                        Saya</label>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full btn-navy py-4 rounded-xl text-sm font-bold tracking-widest shadow-lg shadow-navy-dark/20 active:scale-95 transition-all">
                        LOGIN KE SISTEM <i class="fas fa-sign-in-alt ml-2"></i>
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-[0.2em]">&copy; {{ date('Y') }}
                    Komando Armada II
                    Surabaya</p>
                <div class="flex items-center justify-center space-x-4 mt-2">
                    <span class="w-1 h-1 bg-gray-200 rounded-full"></span>
                    <span class="text-[9px] text-gray-400 font-medium">STAFF OPERASI</span>
                    <span class="w-1 h-1 bg-gray-200 rounded-full"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Toasts -->
    @include('components.toast')
</body>

</html>
