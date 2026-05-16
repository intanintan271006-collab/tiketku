@extends('layouts.app')

@section('content')

<div class="max-w-[1500px] mx-auto">

    <div class="relative overflow-hidden rounded-[36px] bg-[#12051f]/85 border border-white/10 shadow-2xl p-10">

        <div class="absolute inset-0 bg-gradient-to-br from-purple-900/20 via-transparent to-pink-900/20"></div>

        <div class="relative z-10">

            <div class="flex items-center justify-between mb-10">

                <div>
                    <h1 class="text-5xl font-black text-white tracking-tight">
                        Data <span class="text-pink-400">Tiket</span>
                    </h1>

                    <p class="text-gray-300 mt-3 text-lg">
                        Kelola data pemesanan tiket bioskop TiketKu.
                    </p>
                </div>

                <a href="/tiket/create"
                   class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition hover:scale-105">

                    + Tambah Tiket

                </a>

            </div>

            <div class="overflow-hidden rounded-[30px] border border-white/10 shadow-xl bg-white/5">

                <table class="w-full text-left">

                    <thead class="bg-purple-900/80 text-white">
                        <tr>
                            <th class="px-7 py-5 font-black">ID</th>
                            <th class="px-7 py-5 font-black">Film</th>
                            <th class="px-7 py-5 font-black">Pembeli</th>
                            <th class="px-7 py-5 font-black">Jadwal</th>
                            <th class="px-7 py-5 font-black">Kursi</th>
                            <th class="px-7 py-5 font-black">Harga</th>
                            <th class="px-7 py-5 font-black text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-white/10">

                        @forelse($tikets as $tiket)

                            <tr class="hover:bg-white/10 transition">

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $tiket->id_tiket }}
                                </td>

                                <td class="px-7 py-6 font-black text-pink-300">
                                    {{ $tiket->film->judul }}
                                </td>

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $tiket->pembeli->nama }}
                                </td>

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $tiket->jadwal_film }}
                                </td>

                                <td class="px-7 py-6">
                                    <span class="bg-pink-500/20 text-pink-300 px-4 py-2 rounded-full font-black">
                                        {{ $tiket->no_kursi }}
                                    </span>
                                </td>

                                <td class="px-7 py-6 text-gray-100 font-bold">
                                    Rp {{ number_format($tiket->harga, 0, ',', '.') }}
                                </td>

                                <td class="px-7 py-6">

                                    <div class="flex justify-center gap-3">

                                        <a href="/tiket/{{ $tiket->id_tiket }}/edit"
                                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-3 rounded-2xl font-black shadow-lg transition">
                                            Edit
                                        </a>

                                        <form action="/tiket/{{ $tiket->id_tiket }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-2xl font-black shadow-lg transition">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="px-7 py-16 text-center">
                                    <div class="text-5xl mb-4">🎟️</div>

                                    <h2 class="text-2xl font-black text-white mb-2">
                                        Belum Ada Data Tiket
                                    </h2>

                                    <p class="text-gray-300">
                                        Data tiket akan muncul setelah proses pemesanan dibuat.
                                    </p>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection