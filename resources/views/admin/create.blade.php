@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-4xl font-bold text-purple-900 mb-2">
        Tambah Admin
    </h1>

    <p class="text-gray-500 mb-8">
        Tambahkan akun admin baru TiketKu.
    </p>

    <form action="/admin" method="POST" class="space-y-5">

        @csrf

        <div>
            <label class="block font-semibold text-purple-900 mb-2">
                Nama Admin
            </label>

            <input
                type="text"
                name="nama_admin"
                class="w-full border border-gray-200 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-pink-400 outline-none">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">
                Username
            </label>

            <input
                type="text"
                name="username_admin"
                class="w-full border border-gray-200 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-pink-400 outline-none">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">
                Password
            </label>

            <input
                type="password"
                name="password_admin"
                class="w-full border border-gray-200 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-pink-400 outline-none">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">
                Email
            </label>

            <input
                type="email"
                name="email_admin"
                class="w-full border border-gray-200 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-pink-400 outline-none">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">
                No Telepon
            </label>

            <input
                type="text"
                name="no_telp_admin"
                class="w-full border border-gray-200 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-pink-400 outline-none">
        </div>

        <div class="flex gap-3 pt-4">

            <button
                type="submit"
                class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg transition">

                Simpan Admin

            </button>

            <a href="/admin"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-2xl font-semibold transition">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection