<!DOCTYPE html>
<html>
<head>
    <title>TiketKu - Sistem Tiket Bioskop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#0b0618] text-white overflow-x-hidden">

    <!-- Background utama -->
    <div class="fixed inset-0 -z-10 bg-gradient-to-br from-[#0b0618] via-[#1b0b3d] to-[#7a123f]"></div>

    <!-- Dekorasi background cinema -->
    <div class="fixed left-[-55px] top-[110px] -z-10 text-[260px] opacity-20 rotate-[-18deg]">
        🍿
    </div>

    <div class="fixed right-[-80px] top-[85px] -z-10 text-[260px] opacity-16 rotate-[12deg]">
        🎞️
    </div>

    <div class="fixed left-[-60px] bottom-[-60px] -z-10 text-[250px] opacity-13 rotate-[-12deg]">
        🎬
    </div>

    <div class="fixed right-[35px] bottom-[10px] -z-10 text-[210px] opacity-17 rotate-[18deg]">
        🍿
    </div>

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-[#0f071d]/90 backdrop-blur-xl border-b border-white/10">
        <div class="w-full px-10 py-5 flex items-center justify-between">

            <a href="/dashboard" class="flex items-center gap-3">
                <div class="text-4xl text-pink-400">🎟️</div>

                <h1 class="text-4xl font-black tracking-tight">
                    <span class="text-white">Tiket</span><span class="text-pink-400">Ku</span>
                </h1>
            </a>

            <div class="flex items-center gap-8">
                <a href="/dashboard" class="font-bold hover:text-pink-400">Dashboard</a>
                <a href="/film" class="font-bold hover:text-pink-400">Film</a>
                <a href="/pembeli" class="font-bold hover:text-pink-400">Pembeli</a>
                <a href="/tiket" class="font-bold hover:text-pink-400">Tiket</a>
                <a href="/pembayaran" class="font-bold hover:text-pink-400">Pembayaran</a>
                <a href="/admin" class="font-bold hover:text-pink-400">Admin</a>

                <span class="text-gray-300 font-semibold">
                    Halo, {{ session('admin_nama') }}
                </span>

                <a href="/logout"
                   class="bg-pink-500 hover:bg-pink-600 px-6 py-3 rounded-2xl font-bold shadow-xl">
                    Logout
                </a>
            </div>

        </div>
    </nav>

    <!-- Content -->
    <main class="w-full px-10 py-8">

        @if(session('success'))
            <div class="max-w-[1500px] mx-auto bg-green-500/90 text-white px-6 py-4 rounded-2xl mb-6 shadow-xl">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-[1500px] mx-auto bg-red-500/90 text-white px-6 py-4 rounded-2xl mb-6 shadow-xl">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>