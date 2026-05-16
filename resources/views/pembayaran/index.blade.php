@extends('layouts.app')

@section('content')

<div class="max-w-[1500px] mx-auto">

    <div class="relative overflow-hidden rounded-[36px] bg-[#12051f]/85 border border-white/10 shadow-2xl p-10">

        <div class="absolute inset-0 bg-gradient-to-br from-purple-900/20 via-transparent to-pink-900/20"></div>

        <div class="relative z-10">

            <div class="flex items-center justify-between mb-10">

                <div>
                    <h1 class="text-5xl font-black text-white tracking-tight">
                        Data <span class="text-pink-400">Pembayaran</span>
                    </h1>

                    <p class="text-gray-300 mt-3 text-lg">
                        Kelola status dan metode pembayaran tiket bioskop.
                    </p>
                </div>

                <a href="/pembayaran/create"
                   class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition hover:scale-105">
                    + Tambah Pembayaran
                </a>

            </div>

            <div class="overflow-hidden rounded-[30px] border border-white/10 shadow-xl bg-white/5">

                <table class="w-full text-left">

                    <thead class="bg-purple-900/80 text-white">
                        <tr>
                            <th class="px-7 py-5 font-black">ID</th>
                            <th class="px-7 py-5 font-black">Nama Pembeli</th>
                            <th class="px-7 py-5 font-black">Metode</th>
                            <th class="px-7 py-5 font-black">Status</th>
                            <th class="px-7 py-5 font-black">Total</th>
                            <th class="px-7 py-5 font-black text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-white/10">

                        @forelse($pembayarans as $pembayaran)

                            <tr class="hover:bg-white/10 transition">

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $pembayaran->id_pembayaran }}
                                </td>

                                <td class="px-7 py-6 font-black text-pink-300">
                                    {{ $pembayaran->pembeli->nama }}
                                </td>

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $pembayaran->metode_pembayaran ?? 'Belum Dipilih' }}
                                </td>

                                <td class="px-7 py-6">
                                    @if($pembayaran->status == 'Sudah Bayar')
                                        <span class="bg-green-500/20 text-green-300 px-4 py-2 rounded-full font-black">
                                            Sudah Bayar
                                        </span>
                                    @else
                                        <span class="bg-yellow-500/20 text-yellow-300 px-4 py-2 rounded-full font-black">
                                            Belum Bayar
                                        </span>
                                    @endif
                                </td>

                                <td class="px-7 py-6 text-gray-100 font-bold">
                                    Rp {{ number_format($pembayaran->total_pembayaran, 0, ',', '.') }}
                                </td>

                                <td class="px-7 py-6">

                                    <div class="flex justify-center gap-3">

                                        @if($pembayaran->status == 'Belum Bayar')
                                            <a href="/pembayaran/{{ $pembayaran->id_pembayaran }}/bayar"
                                               class="bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-2xl font-black shadow-lg transition">
                                                Bayar
                                            </a>
                                        @endif

                                        <a href="/pembayaran/{{ $pembayaran->id_pembayaran }}/tiket"
                                           class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-2xl font-black shadow-lg transition">
                                            Tiket
                                        </a>

                                        <a href="/pembayaran/{{ $pembayaran->id_pembayaran }}/edit"
                                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-3 rounded-2xl font-black shadow-lg transition">
                                            Edit
                                        </a>

                                        <form action="/pembayaran/{{ $pembayaran->id_pembayaran }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-2xl font-black shadow-lg transition">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-7 py-16 text-center">
                                    <div class="text-5xl mb-4">💳</div>

                                    <h2 class="text-2xl font-black text-white mb-2">
                                        Belum Ada Data Pembayaran
                                    </h2>

                                    <p class="text-gray-300">
                                        Data pembayaran akan muncul setelah tiket dipesan.
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