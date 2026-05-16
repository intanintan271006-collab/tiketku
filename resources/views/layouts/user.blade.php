<!DOCTYPE html>
<html>
<head>
    <title>TiketKu - Pembeli</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#0b0618] text-white overflow-x-hidden">

    <div class="fixed inset-0 -z-10 bg-gradient-to-br from-[#0b0618] via-[#1b0b3d] to-[#7a123f]"></div>

    <div class="fixed left-[-55px] top-[110px] -z-10 text-[260px] opacity-20 rotate-[-18deg]">🍿</div>
    <div class="fixed right-[-80px] top-[85px] -z-10 text-[260px] opacity-16 rotate-[12deg]">🎞️</div>
    <div class="fixed left-[-60px] bottom-[-60px] -z-10 text-[250px] opacity-13 rotate-[-12deg]">🎬</div>
    <div class="fixed right-[35px] bottom-[10px] -z-10 text-[210px] opacity-17 rotate-[18deg]">🍿</div>

    <nav class="sticky top-0 z-50 bg-[#0f071d]/90 backdrop-blur-xl border-b border-white/10">
        <div class="w-full px-10 py-5 flex items-center justify-between">

            <a href="/beranda" class="flex items-center gap-3">
                <div class="text-4xl text-pink-400">🎟️</div>
                <h1 class="text-4xl font-black">
                    <span class="text-white">Tiket</span><span class="text-pink-400">Ku</span>
                </h1>
            </a>


            <div class="flex items-center gap-8 font-bold">
                <a href="/beranda" class="hover:text-pink-400">Beranda</a>

                <a href="/tiket-saya" class="hover:text-pink-400">
                    Tiket Saya
                </a>

                @if(session('pembeli_id'))
                    <span class="text-gray-300">
                        Halo, {{ session('pembeli_nama') }}
                    </span>

                    <a href="/logout-pembeli"
                       class="bg-pink-500 hover:bg-pink-600 px-5 py-3 rounded-2xl shadow-xl">
                        Logout
                    </a>
                @else
                    <a href="/login-pembeli" class="hover:text-pink-400">Login</a>

                    <a href="/register-pembeli"
                       class="bg-pink-500 hover:bg-pink-600 px-5 py-3 rounded-2xl shadow-xl">
                        Daftar
                    </a>
                @endif
            </div>

        </div>
    </nav>

    <main class="w-full px-10 py-10">
        @yield('content')
    </main>

</body>
</html>