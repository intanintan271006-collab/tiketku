@extends('layouts.app')

@section('content')

<div class="relative max-w-[1500px] mx-auto min-h-[680px] overflow-hidden rounded-[36px] bg-[#12051f]/85 border border-white/10 shadow-2xl p-10">

    <!-- Gradient glow -->
    <div class="absolute inset-0 bg-gradient-to-br from-purple-900/20 via-transparent to-pink-900/20"></div>

    <div class="relative z-10">

        <!-- Header -->
        <div class="flex items-center justify-between mb-12">

            <div>
                <h1 class="text-5xl font-black text-white tracking-tight">
                    Dashboard <span class="text-pink-400">TiketKu</span>
                </h1>

                <p class="text-gray-300 text-lg mt-3">
                    Dashboard pengelolaan sistem tiket bioskop modern
                </p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-3xl px-8 py-5 shadow-xl">
                <p class="text-gray-300 text-sm">
                    Login sebagai
                </p>

                <h2 class="text-pink-400 text-2xl font-black">
                    {{ session('admin_nama') }}
                </h2>
            </div>

        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-7 mb-10">

            <div class="bg-gradient-to-br from-purple-900/60 to-purple-700/20 border border-purple-400/10 rounded-3xl p-8 shadow-xl hover:scale-[1.02] transition">

                <p class="text-gray-300 text-lg mb-4">
                    Total Film
                </p>

                <h2 class="text-6xl font-black text-white">
                    {{ $jumlahFilm }}
                </h2>

                <a href="/film"
                   class="inline-block mt-6 text-pink-300 hover:text-pink-200 font-bold">
                    Lihat Film →
                </a>

            </div>

            <div class="bg-gradient-to-br from-pink-900/40 to-purple-800/20 border border-pink-400/10 rounded-3xl p-8 shadow-xl hover:scale-[1.02] transition">

                <p class="text-gray-300 text-lg mb-4">
                    Total Pembeli
                </p>

                <h2 class="text-6xl font-black text-white">
                    {{ $jumlahPembeli }}
                </h2>

                <a href="/pembeli"
                   class="inline-block mt-6 text-pink-300 hover:text-pink-200 font-bold">
                    Lihat Pembeli →
                </a>

            </div>

            <div class="bg-gradient-to-br from-indigo-900/50 to-purple-800/20 border border-indigo-400/10 rounded-3xl p-8 shadow-xl hover:scale-[1.02] transition">

                <p class="text-gray-300 text-lg mb-4">
                    Total Tiket
                </p>

                <h2 class="text-6xl font-black text-white">
                    {{ $jumlahTiket }}
                </h2>

                <a href="/tiket"
                   class="inline-block mt-6 text-pink-300 hover:text-pink-200 font-bold">
                    Lihat Tiket →
                </a>

            </div>

            <div class="bg-gradient-to-br from-pink-900/40 to-purple-900/20 border border-pink-400/10 rounded-3xl p-8 shadow-xl hover:scale-[1.02] transition">

                <p class="text-gray-300 text-lg mb-4">
                    Total Pembayaran
                </p>

                <h2 class="text-6xl font-black text-white">
                    {{ $jumlahPembayaran }}
                </h2>

                <a href="/pembayaran"
                   class="inline-block mt-6 text-pink-300 hover:text-pink-200 font-bold">
                    Lihat Pembayaran →
                </a>

            </div>

        </div>

        <!-- Menu cepat -->
        <div class="bg-white/5 border border-white/10 rounded-3xl p-8 shadow-xl">

            <h2 class="text-3xl font-black text-white mb-7">
                Menu Cepat
            </h2>

            <div class="flex flex-wrap gap-5">

                <a href="/film/create"
                   class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition hover:scale-105">

                    + Tambah Film

                </a>

                <a href="/tiket/create"
                   class="bg-purple-700/70 hover:bg-purple-700 text-white px-8 py-4 rounded-2xl font-black shadow-xl border border-white/10 transition hover:scale-105">

                    + Pesan Tiket

                </a>

                <a href="/pembayaran/create"
                   class="bg-purple-800/60 hover:bg-purple-800 text-white px-8 py-4 rounded-2xl font-black shadow-xl border border-white/10 transition hover:scale-105">

                    + Tambah Pembayaran

                </a>

            </div>

        </div>

    </div>

</div>

@endsection