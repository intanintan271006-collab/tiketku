@extends('layouts.app')

@section('content')

<div class="max-w-[1500px] mx-auto">

    <div class="relative overflow-hidden rounded-[36px] bg-[#12051f]/85 border border-white/10 shadow-2xl p-10">

        <div class="absolute inset-0 bg-gradient-to-br from-purple-900/20 via-transparent to-pink-900/20"></div>

        <div class="relative z-10">

            <div class="flex items-center justify-between mb-10">

                <div>
                    <h1 class="text-5xl font-black text-white tracking-tight">
                        Data <span class="text-pink-400">Pembeli</span>
                    </h1>

                    <p class="text-gray-300 mt-3 text-lg">
                        Kelola data pembeli yang terdaftar di TiketKu.
                    </p>
                </div>

                <a href="/pembeli/create"
                   class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition hover:scale-105">

                    + Tambah Pembeli

                </a>

            </div>

            <div class="overflow-hidden rounded-[30px] border border-white/10 shadow-xl bg-white/5">

                <table class="w-full text-left">

                    <thead class="bg-purple-900/80 text-white">
                        <tr>
                            <th class="px-7 py-5 text-base font-black">ID</th>
                            <th class="px-7 py-5 text-base font-black">Nama</th>
                            <th class="px-7 py-5 text-base font-black">Username</th>
                            <th class="px-7 py-5 text-base font-black">Email</th>
                            <th class="px-7 py-5 text-base font-black">No Telp</th>
                            <th class="px-7 py-5 text-base font-black text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-white/10">

                        @forelse($pembelis as $pembeli)

                            <tr class="hover:bg-white/10 transition">

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $pembeli->id_pembeli }}
                                </td>

                                <td class="px-7 py-6 font-black text-pink-300">
                                    {{ $pembeli->nama }}
                                </td>

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $pembeli->username }}
                                </td>

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $pembeli->email }}
                                </td>

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $pembeli->no_telp }}
                                </td>

                                <td class="px-7 py-6">
                                    <div class="flex justify-center gap-3">

                                        <a href="/pembeli/{{ $pembeli->id_pembeli }}/edit"
                                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-3 rounded-2xl font-black shadow-lg transition">
                                            Edit
                                        </a>

                                        <form action="/pembeli/{{ $pembeli->id_pembeli }}" method="POST">
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
                                <td colspan="6" class="px-7 py-14 text-center text-gray-300 text-lg">
                                    Belum ada data pembeli.
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