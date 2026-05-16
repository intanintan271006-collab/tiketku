@extends('layouts.app')

@section('content')

@php
    $sedangTayang = $films->where('status_tayang', 'Sedang Tayang');
    $akanTayang = $films->where('status_tayang', 'Akan Tayang');
@endphp

<div class="max-w-[1550px] mx-auto">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-12">

        <div>
            <h1 class="text-6xl font-black text-white tracking-tight">
                Film <span class="text-pink-400">TiketKu</span>
            </h1>

            <p class="text-gray-300 mt-4 text-xl">
                Kelola film bioskop yang sedang tayang dan akan tayang.
            </p>
        </div>

        <a href="/film/create"
           class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition hover:scale-105 text-center">

            + Tambah Film

        </a>

    </div>

    <!-- SEDANG TAYANG -->
    <div class="mb-16">

        <div class="flex items-center gap-4 mb-8">

            <div class="w-2 h-12 bg-pink-500 rounded-full"></div>

            <div>
                <h2 class="text-4xl font-black text-white">
                    Sedang Tayang
                </h2>

                <p class="text-gray-300 mt-1">
                    Film yang sedang tersedia di bioskop.
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @forelse($sedangTayang as $film)

                <div class="group bg-white/5 backdrop-blur-xl border border-white/10 rounded-[32px] overflow-hidden shadow-2xl hover:-translate-y-2 transition duration-300">

                    <!-- Poster -->
                    <div class="relative overflow-hidden">

                        @if($film->poster)

                            <img src="{{ asset('storage/' . $film->poster) }}"
                                 class="w-full h-[430px] object-cover group-hover:scale-105 transition duration-500">

                        @else

                            <div class="w-full h-[430px] bg-gradient-to-br from-purple-900 to-pink-700 flex items-center justify-center text-7xl">
                                🎬
                            </div>

                        @endif

                        <!-- Badge -->
                        <div class="absolute top-4 left-4 bg-pink-500 text-white px-4 py-2 rounded-full text-sm font-black shadow-xl">
                            Sedang Tayang
                        </div>

                    </div>

                    <!-- Content -->
                    <div class="p-6">

                        <div class="flex items-start justify-between mb-3">

                            <h2 class="text-3xl font-black text-white leading-tight">
                                {{ $film->judul }}
                            </h2>

                            <div class="bg-yellow-400/20 text-yellow-300 px-3 py-1 rounded-xl font-bold text-sm">
                                ⭐ {{ $film->rating ?? '-' }}
                            </div>

                        </div>

                        <p class="text-pink-300 font-semibold mb-2">
                            🎭 {{ $film->genre ?? 'Genre belum ada' }}
                        </p>

                        <p class="text-gray-300 mb-1">
                            ⏱ {{ $film->durasi }}
                        </p>

                        <p class="text-gray-300 mb-5">
                            📅 {{ $film->jadwal_tayang }}
                        </p>

                        <div class="flex gap-3 mb-3">

                            <a href="/tiket/create"
                               class="flex-1 bg-pink-500 hover:bg-pink-600 text-white text-center py-3 rounded-2xl font-black transition">

                                Pesan

                            </a>

                            <a href="/film/{{ $film->id_film }}/edit"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-3 rounded-2xl font-black transition">

                                Edit

                            </a>

                        </div>

                        <form action="/film/{{ $film->id_film }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl font-black transition">

                                Hapus Film

                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="col-span-full bg-white/5 border border-white/10 rounded-3xl p-12 text-center">

                    <h2 class="text-3xl font-black text-white mb-3">
                        Belum Ada Film
                    </h2>

                    <p class="text-gray-300">
                        Belum ada film yang sedang tayang.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

    <!-- AKAN TAYANG -->
    <div>

        <div class="flex items-center gap-4 mb-8">

            <div class="w-2 h-12 bg-purple-500 rounded-full"></div>

            <div>
                <h2 class="text-4xl font-black text-white">
                    Akan Tayang
                </h2>

                <p class="text-gray-300 mt-1">
                    Film yang segera hadir di bioskop.
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @forelse($akanTayang as $film)

                <div class="group bg-white/5 backdrop-blur-xl border border-white/10 rounded-[32px] overflow-hidden shadow-2xl hover:-translate-y-2 transition duration-300">

                    <!-- Poster -->
                    <div class="relative overflow-hidden">

                        @if($film->poster)

                            <img src="{{ asset('storage/' . $film->poster) }}"
                                 class="w-full h-[430px] object-cover group-hover:scale-105 transition duration-500">

                        @else

                            <div class="w-full h-[430px] bg-gradient-to-br from-purple-900 to-indigo-700 flex items-center justify-center text-7xl">
                                🍿
                            </div>

                        @endif

                        <div class="absolute top-4 left-4 bg-purple-600 text-white px-4 py-2 rounded-full text-sm font-black shadow-xl">
                            Akan Tayang
                        </div>

                    </div>

                    <!-- Content -->
                    <div class="p-6">

                        <div class="flex items-start justify-between mb-3">

                            <h2 class="text-3xl font-black text-white leading-tight">
                                {{ $film->judul }}
                            </h2>

                            @if($film->status_tayang == 'Sedang Tayang')

                                <div class="bg-yellow-500/20 text-yellow-300 px-4 py-2 rounded-2xl text-sm font-bold">
                                ⭐ {{ $film->rating }}
                                </div>

                            @endif

                        </div>

                        <p class="text-pink-300 font-semibold mb-2">
                            🎭 {{ $film->genre ?? 'Genre belum ada' }}
                        </p>

                        <p class="text-gray-300 mb-1">
                            ⏱ {{ $film->durasi }}
                        </p>

                        <p class="text-gray-300 mb-5">
                            📅 {{ $film->jadwal_tayang }}
                        </p>

                        <a href="/film/{{ $film->id_film }}/edit"
                           class="block w-full bg-purple-600 hover:bg-purple-700 text-white text-center py-3 rounded-2xl font-black transition">

                            Edit Film

                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-full bg-white/5 border border-white/10 rounded-3xl p-12 text-center">

                    <h2 class="text-3xl font-black text-white mb-3">
                        Belum Ada Film
                    </h2>

                    <p class="text-gray-300">
                        Belum ada film yang akan tayang.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection