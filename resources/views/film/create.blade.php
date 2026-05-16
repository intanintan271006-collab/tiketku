@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="mb-10">
        <h1 class="text-5xl font-black text-white">
            Tambah <span class="text-pink-400">Film</span>
        </h1>

        <p class="text-gray-300 mt-3 text-lg">
            Tambahkan film bioskop baru ke sistem TiketKu.
        </p>
    </div>

    <form action="/film"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-[35px] p-10 shadow-2xl">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div>
                <label class="block text-white font-bold mb-3">
                    Judul Film
                </label>

                <input type="text"
                       name="judul"
                       class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4 outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
                <label class="block text-white font-bold mb-3">
                    Genre
                </label>

                <input type="text"
                       name="genre"
                       class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4 outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
                <label class="block text-white font-bold mb-3">
                    Durasi
                </label>

                <input type="text"
                       name="durasi"
                       placeholder="Contoh: 2 Jam 15 Menit"
                       class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4 outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
                <label class="block text-white font-bold mb-3">
                    Jadwal Tayang
                </label>

                <input type="text"
                       name="jadwal_tayang"
                       placeholder="Contoh: 13:00, 15:30, 18:00"
                       class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4 outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
    <label class="block font-semibold text-purple-900 mb-2">
        Studio
    </label>

    <select name="studio"
            class="w-full border border-gray-200 rounded-2xl px-5 py-3">

        <option value="Studio 1">Studio 1</option>
        <option value="Studio 2">Studio 2</option>
        <option value="Studio VIP">Studio VIP</option>

    </select>
</div>

            <div>
                <label class="block text-white font-bold mb-3">
                    Rating
                </label>

                <input type="text"
                       name="rating"
                       placeholder="Contoh: 8.5"
                       class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4 outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
                <label class="block text-white font-bold mb-3">
                    Status Tayang
                </label>

                <select name="status_tayang"
                        class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4 outline-none">

                    <option class="text-black" value="Sedang Tayang">
                        Sedang Tayang
                    </option>

                    <option class="text-black" value="Akan Tayang">
                        Akan Tayang
                    </option>

                </select>
            </div>

        </div>

        <div class="mt-8">
            <label class="block text-white font-bold mb-3">
                Sinopsis
            </label>

            <textarea name="sinopsis"
                      rows="5"
                      class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4 outline-none focus:ring-2 focus:ring-pink-500"></textarea>
        </div>

        <div class="mt-8">
            <label class="block text-white font-bold mb-3">
                Poster Film
            </label>

            <input type="file"
                   name="poster"
                   class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4">
        </div>

        <div class="flex gap-5 mt-10">

            <button
                class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition hover:scale-105">

                Simpan Film

            </button>

            <a href="/film"
               class="bg-white/10 hover:bg-white/20 border border-white/10 text-white px-8 py-4 rounded-2xl font-black transition">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection