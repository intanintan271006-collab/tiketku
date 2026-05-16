@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">
    <h1 class="text-4xl font-bold text-purple-900 mb-2">Edit Tiket</h1>
    <p class="text-gray-500 mb-8">Perbarui data tiket bioskop.</p>

    <form action="/tiket/{{ $tiket->id_tiket }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Film</label>

            <select name="id_film"
                class="w-full border border-gray-200 rounded-2xl px-5 py-3">

                @foreach($films as $film)
                    <option value="{{ $film->id_film }}"
                        {{ $film->id_film == $tiket->id_film ? 'selected' : '' }}>
                        {{ $film->judul }}
                    </option>
                @endforeach

            </select>
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Pembeli</label>

            <select name="id_pembeli"
                class="w-full border border-gray-200 rounded-2xl px-5 py-3">

                @foreach($pembelis as $pembeli)
                    <option value="{{ $pembeli->id_pembeli }}"
                        {{ $pembeli->id_pembeli == $tiket->id_pembeli ? 'selected' : '' }}>
                        {{ $pembeli->nama }}
                    </option>
                @endforeach

            </select>
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Jadwal Film</label>

            <input type="text"
                   name="jadwal_film"
                   value="{{ $tiket->jadwal_film }}"
                   class="w-full border border-gray-200 rounded-2xl px-5 py-3">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">No Kursi</label>

            <input type="text"
                   name="no_kursi"
                   value="{{ $tiket->no_kursi }}"
                   class="w-full border border-gray-200 rounded-2xl px-5 py-3">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Harga</label>

            <input type="text"
                   name="harga"
                   value="{{ $tiket->harga }}"
                   class="w-full border border-gray-200 rounded-2xl px-5 py-3">
        </div>

        <div class="flex gap-3 pt-4">

            <button class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-2xl font-semibold">
                Update Tiket
            </button>

            <a href="/tiket"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-2xl font-semibold">
                Kembali
            </a>

        </div>

    </form>
</div>

@endsection