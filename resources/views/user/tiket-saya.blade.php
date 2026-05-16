@extends('layouts.user')

@section('content')

<div class="max-w-[1500px] mx-auto">

    <div class="mb-12">

        <h1 class="text-6xl font-black">
            Tiket <span class="text-pink-400">Saya</span>
        </h1>

        <p class="text-gray-300 mt-4 text-xl">
            Daftar tiket bioskop yang pernah kamu pesan.
        </p>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        @forelse($pembayarans as $pembayaran)

            <div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-[35px] overflow-hidden shadow-2xl">

                <div class="p-8">

                    <div class="flex items-start justify-between mb-6">

                        <div>

                            <p class="text-gray-300 mb-2">
                                Film
                            </p>

                            <h2 class="text-4xl font-black text-white">
                                {{ $pembayaran->tiket->film->judul ?? '-' }}
                            </h2>

                        </div>

                        @if($pembayaran->status == 'Sudah Bayar')

                            <span class="bg-green-500/20 text-green-300 px-5 py-3 rounded-full font-black">
                                Sudah Bayar
                            </span>

                        @else

                            <span class="bg-yellow-500/20 text-yellow-300 px-5 py-3 rounded-full font-black">
                                Belum Bayar
                            </span>

                        @endif

                    </div>

                    <div class="grid grid-cols-2 gap-5 mb-8">

                        <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
                            <p class="text-gray-300 mb-2">Kursi</p>

                            <h2 class="text-2xl font-black">
                                {{ $pembayaran->tiket->no_kursi ?? '-' }}
                            </h2>
                        </div>

                        <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
                            <p class="text-gray-300 mb-2">Jadwal</p>

                            <h2 class="text-2xl font-black">
                                {{ $pembayaran->tiket->jadwal_film ?? '-' }}
                            </h2>
                        </div>

                    </div>

                    <div class="flex gap-4">

                        <a href="/tiket-saya/{{ $pembayaran->id_pembayaran }}/eticket"
                           class="flex-1 bg-pink-500 hover:bg-pink-600 text-white text-center py-4 rounded-2xl font-black shadow-xl transition">

                            🎟 Lihat E-Ticket

                        </a>

                        @if($pembayaran->status == 'Belum Bayar')

                            <a href="/pembayaran-user/{{ $pembayaran->id_pembayaran }}"
                                class="bg-green-500 hover:bg-green-600 text-white px-6 py-4 rounded-2xl font-black shadow-xl transition">

                                Bayar

                            </a>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="col-span-full bg-white/10 border border-white/10 rounded-[35px] p-16 text-center">

                <div class="text-7xl mb-5">
                    🎟️
                </div>

                <h2 class="text-4xl font-black text-white mb-3">
                    Belum Ada Tiket
                </h2>

                <p class="text-gray-300 text-lg">
                    Kamu belum memesan tiket bioskop.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection