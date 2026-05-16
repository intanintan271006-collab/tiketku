@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="relative overflow-hidden rounded-[40px] bg-[#12051f]/90 border border-white/10 shadow-2xl">

        <div class="absolute inset-0 bg-gradient-to-br from-purple-900/40 via-pink-900/30 to-pink-600/40"></div>

        <div class="relative z-10 p-10">

            <div class="flex items-center justify-between mb-10">

                <div class="flex items-center gap-4">
                    <div class="text-6xl">
                        🎟️
                    </div>

                    <div>
                        <h1 class="text-5xl font-black text-white">
                            Tiket<span class="text-pink-400">Ku</span>
                        </h1>

                        <p class="text-gray-300 mt-1">
                            E-Ticket Bioskop
                        </p>
                    </div>
                </div>

                <div class="text-right bg-white/10 border border-white/10 rounded-3xl px-6 py-4">
                    <p class="text-gray-300 text-sm">
                        STATUS
                    </p>

                    @if($pembayaran->status == 'Sudah Bayar')
                        <h2 class="text-green-300 text-2xl font-black">
                            Sudah Bayar
                        </h2>
                    @else
                        <h2 class="text-yellow-300 text-2xl font-black">
                            Belum Bayar
                        </h2>
                    @endif
                </div>

            </div>

            <div class="bg-white/10 border border-white/10 rounded-3xl p-8 mb-8">

                <p class="text-gray-300 mb-2">
                    Film
                </p>

                <h2 class="text-4xl font-black text-white">
                    {{ $tiket->film->judul ?? '-' }}
                </h2>

                <p class="text-pink-300 mt-3 font-semibold">
                    {{ $tiket->film->genre ?? 'Genre belum tersedia' }}
                </p>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                <div class="bg-white/10 border border-white/10 rounded-3xl p-6">
                    <p class="text-gray-300 mb-2">Nama Pembeli</p>
                    <h2 class="text-2xl font-black text-white">
                        {{ $pembayaran->pembeli->nama }}
                    </h2>
                </div>

                <div class="bg-white/10 border border-white/10 rounded-3xl p-6">
                    <p class="text-gray-300 mb-2">Kursi</p>
                    <h2 class="text-2xl font-black text-white">
                        {{ $tiket->no_kursi ?? '-' }}
                    </h2>
                </div>

                <div class="bg-white/10 border border-white/10 rounded-3xl p-6">
                    <p class="text-gray-300 mb-2">Jadwal Tayang</p>
                    <h2 class="text-2xl font-black text-white">
                        {{ $tiket->jadwal_film ?? '-' }}
                    </h2>
                </div>

                <div class="bg-white/10 border border-white/10 rounded-3xl p-6">
                    <p class="text-gray-300 mb-2">Total Bayar</p>
                    <h2 class="text-2xl font-black text-white">
                        Rp {{ number_format($pembayaran->total_pembayaran, 0, ',', '.') }}
                    </h2>
                </div>

            </div>

            <div class="bg-white/10 border border-white/10 rounded-3xl p-8 text-center mb-8">

                <p class="text-gray-300 mb-4">
                    Tunjukkan tiket ini saat masuk studio
                </p>

                <div class="text-7xl mb-2">
                    @php
    $qrData = 'TiketKu | Film: ' . ($tiket->film->judul ?? '-') .
              ' | Pembeli: ' . $pembayaran->pembeli->nama .
              ' | Kursi: ' . ($tiket->no_kursi ?? '-') .
              ' | Jadwal: ' . ($tiket->jadwal_film ?? '-') .
              ' | Status: ' . $pembayaran->status;

    $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=' . urlencode($qrData);
@endphp

<div class="bg-white rounded-3xl p-5 inline-block shadow-xl">
    <img src="{{ $qrUrl }}" class="w-44 h-44">
</div>

<p class="text-pink-300 font-bold mt-4">
    Scan QR Code untuk validasi tiket
</p>
                </div>

                <p class="text-pink-300 font-bold">
                    TiketKu Cinema Pass
                </p>

            </div>

            <div class="flex gap-4">

                 <button onclick="window.print()"
                 class="bg-green-500 hover:bg-green-600 text-white px-7 py-4 rounded-2xl font-black shadow-xl">
                  Cetak Tiket
                 </button>

                <a href="/pembayaran"
                   class="bg-white text-purple-900 px-7 py-4 rounded-2xl font-black shadow-xl">
                    Kembali
                </a>

                <a href="/tiket"
                   class="bg-pink-500 hover:bg-pink-600 text-white px-7 py-4 rounded-2xl font-black shadow-xl">
                    Lihat Data Tiket
                </a>

            </div>

        </div>

    </div>

</div>

@endsection