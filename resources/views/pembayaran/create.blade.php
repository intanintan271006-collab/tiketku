@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-4xl font-bold text-purple-900 mb-2">
        Tambah Pembayaran
    </h1>

    <p class="text-gray-500 mb-8">
        Tambahkan data pembayaran tiket bioskop.
    </p>

    <form action="/pembayaran" method="POST" class="space-y-5">

        @csrf

        <div>
            <label class="block font-semibold text-purple-900 mb-2">
                Pembeli
            </label>

            <select name="id_pembeli"
                class="w-full border border-gray-200 rounded-2xl px-5 py-3">

                @foreach($pembelis as $pembeli)
                    <option value="{{ $pembeli->id_pembeli }}">
                        {{ $pembeli->nama }}
                    </option>
                @endforeach

            </select>
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">
                Metode Pembayaran
            </label>

            <select name="metode_pembayaran"
                class="w-full border border-gray-200 rounded-2xl px-5 py-3">

                <option>Transfer Bank</option>
                <option>E-Wallet</option>
                <option>Cash</option>

            </select>
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">
                Status
            </label>

            <select name="status"
                class="w-full border border-gray-200 rounded-2xl px-5 py-3">

                <option>Belum Bayar</option>
                <option>Sudah Bayar</option>

            </select>
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">
                Total Pembayaran
            </label>

            <input type="text"
                   name="total_pembayaran"
                   class="w-full border border-gray-200 rounded-2xl px-5 py-3">
        </div>

        <div class="flex gap-3 pt-4">

            <button class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-2xl font-semibold">
                Simpan Pembayaran
            </button>

            <a href="/pembayaran"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-2xl font-semibold">
                Kembali
            </a>

        </div>

    </form>
</div>

@endsection