<!DOCTYPE html>
<html>
<head>
    <title>{{ $film->judul }} - TiketKu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-[#0b0618] via-[#1b0b3d] to-[#7a123f] text-white">

<!-- Background -->
<div class="fixed inset-0 -z-10 bg-gradient-to-br from-[#0b0618] via-[#1b0b3d] to-[#7a123f]"></div>

<!-- Navbar -->
<nav class="px-10 py-5 flex justify-between items-center bg-black/30 border-b border-white/10">

    <a href="/beranda" class="flex items-center gap-3">
        <span class="text-4xl">🎟️</span>

        <h1 class="text-4xl font-black">
            Tiket<span class="text-pink-400">Ku</span>
        </h1>
    </a>

    <div class="flex gap-8 font-bold">
        <a href="/beranda" class="hover:text-pink-400">
            Beranda
        </a>

        <a href="/login" class="hover:text-pink-400">
            Login Admin
        </a>
    </div>

</nav>

<div class="max-w-[1500px] mx-auto px-10 py-12">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

        <!-- Poster -->
        <div>

            @if($film->poster)

                <img src="{{ asset('storage/' . $film->poster) }}"
                     class="w-full rounded-[40px] shadow-2xl object-cover h-[780px]">

            @else

                <div class="w-full h-[780px] bg-purple-900 rounded-[40px] flex items-center justify-center text-8xl">
                    🎬
                </div>

            @endif

        </div>

        <!-- Detail -->
        <div class="flex flex-col justify-center">

            <span class="bg-pink-500/20 text-pink-300 px-5 py-3 rounded-full w-fit font-black mb-6">
                {{ $film->status_tayang }}
            </span>

            <h1 class="text-7xl font-black leading-tight">
                {{ $film->judul }}
            </h1>

            <div class="flex flex-wrap gap-4 mt-8 mb-8">

                <div class="bg-white/10 border border-white/10 px-5 py-3 rounded-2xl">
                    🎭 {{ $film->genre }}
                </div>

                <div class="bg-white/10 border border-white/10 px-5 py-3 rounded-2xl">
                    ⭐ {{ $film->rating }}
                </div>

                <div class="bg-white/10 border border-white/10 px-5 py-3 rounded-2xl">
                    ⏱ {{ $film->durasi }}
                </div>

                 <div class="bg-white/10 border border-white/10 px-5 py-3 rounded-2xl">
                🎬 {{ $film->studio }}
                </div>

                <div class="bg-white/10 border border-white/10 px-5 py-3 rounded-2xl">
                    📍 CGV Transmart Lampung
                </div>

            </div>

            <div class="bg-white/5 border border-white/10 rounded-[30px] p-8 mb-8">

                <h2 class="text-3xl font-black mb-5">
                    Sinopsis
                </h2>

                <p class="text-gray-300 text-lg leading-relaxed">
                    {{ $film->sinopsis ?? 'Sinopsis belum tersedia.' }}
                </p>

            </div>

            <div class="bg-white/5 border border-white/10 rounded-[30px] p-8 mb-10">

                <h2 class="text-2xl font-black mb-4">
                    Jadwal Tayang
                </h2>

                <p class="text-pink-300 text-3xl font-black">
                    {{ $film->jadwal_tayang }}
                </p>

            </div>

            <div class="flex gap-5">

                <a href="/pesan/{{ $film->id_film }}"
                   class="bg-pink-500 hover:bg-pink-600 text-white px-10 py-5 rounded-3xl font-black text-xl shadow-2xl transition hover:scale-105">

                    🎟 Pesan Tiket

                </a>

                <a href="/beranda"
                   class="bg-white/10 hover:bg-white/20 border border-white/10 text-white px-10 py-5 rounded-3xl font-black text-xl transition">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>