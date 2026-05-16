@extends('layouts.app')

@section('content')

<div class="max-w-[1500px] mx-auto">

    <div class="relative overflow-hidden rounded-[36px] bg-[#12051f]/85 border border-white/10 shadow-2xl p-10">

        <div class="absolute inset-0 bg-gradient-to-br from-purple-900/20 via-transparent to-pink-900/20"></div>

        <div class="relative z-10">

            <div class="flex items-center justify-between mb-10">

                <div>
                    <h1 class="text-5xl font-black text-white tracking-tight">
                        Data <span class="text-pink-400">Admin</span>
                    </h1>

                    <p class="text-gray-300 mt-3 text-lg">
                        Kelola akun admin yang dapat mengakses sistem TiketKu.
                    </p>
                </div>

                <a href="/admin/create"
                   class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition hover:scale-105">
                    + Tambah Admin
                </a>

            </div>

            <div class="overflow-hidden rounded-[30px] border border-white/10 shadow-xl bg-white/5">

                <table class="w-full text-left">

                    <thead class="bg-purple-900/80 text-white">
                        <tr>
                            <th class="px-7 py-5 font-black">ID</th>
                            <th class="px-7 py-5 font-black">Nama Admin</th>
                            <th class="px-7 py-5 font-black">Username</th>
                            <th class="px-7 py-5 font-black">Email</th>
                            <th class="px-7 py-5 font-black">No Telp</th>
                            <th class="px-7 py-5 font-black text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-white/10">

                        @forelse($admins as $admin)

                            <tr class="hover:bg-white/10 transition">

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $admin->id_admin }}
                                </td>

                                <td class="px-7 py-6 font-black text-pink-300">
                                    {{ $admin->nama_admin }}
                                </td>

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $admin->username_admin }}
                                </td>

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $admin->email_admin }}
                                </td>

                                <td class="px-7 py-6 text-gray-100">
                                    {{ $admin->no_telp_admin }}
                                </td>

                                <td class="px-7 py-6">

                                    <div class="flex justify-center gap-3">

                                        <a href="/admin/{{ $admin->id_admin }}/edit"
                                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-3 rounded-2xl font-black shadow-lg transition">
                                            Edit
                                        </a>

                                        <form action="/admin/{{ $admin->id_admin }}" method="POST">
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
                                    <div class="text-5xl mb-4">🛡️</div>

                                    <h2 class="text-2xl font-black text-white mb-2">
                                        Belum Ada Data Admin
                                    </h2>

                                    <p class="text-gray-300">
                                        Data admin akan muncul setelah akun admin ditambahkan.
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