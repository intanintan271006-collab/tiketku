@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">
    <h1 class="text-4xl font-bold text-purple-900 mb-2">Edit Admin</h1>
    <p class="text-gray-500 mb-8">Perbarui data admin TiketKu.</p>

    <form action="/admin/{{ $admin->id_admin }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Nama Admin</label>
            <input type="text" name="nama_admin" value="{{ $admin->nama_admin }}"
                   class="w-full border border-gray-200 rounded-2xl px-5 py-3">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Username</label>
            <input type="text" name="username_admin" value="{{ $admin->username_admin }}"
                   class="w-full border border-gray-200 rounded-2xl px-5 py-3">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Password</label>
            <input type="text" name="password_admin" value="{{ $admin->password_admin }}"
                   class="w-full border border-gray-200 rounded-2xl px-5 py-3">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Email</label>
            <input type="email" name="email_admin" value="{{ $admin->email_admin }}"
                   class="w-full border border-gray-200 rounded-2xl px-5 py-3">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">No Telepon</label>
            <input type="text" name="no_telp_admin" value="{{ $admin->no_telp_admin }}"
                   class="w-full border border-gray-200 rounded-2xl px-5 py-3">
        </div>

        <div class="flex gap-3 pt-4">
            <button class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-2xl font-semibold">
                Update Admin
            </button>

            <a href="/admin" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-2xl font-semibold">
                Kembali
            </a>
        </div>
    </form>
</div>

@endsection