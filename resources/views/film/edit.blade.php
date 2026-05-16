@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="mb-10">
        <h1 class="text-5xl font-black text-white">
            Edit <span class="text-pink-400">Film</span>
        </h1>

        <p class="text-gray-300 mt-3 text-lg">
            Perbarui data film bioskop TiketKu.
        </p>
    </div>

    <form action="/film/{{ $film->id_film }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-[35px] p-10 shadow-2xl">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div>
                <label class="block text-white font-bold mb-3">Judul Film</label>

                <input type="text"
                       name="judul"
                       value="{{ $film->judul }}"
                       class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4">
            </div>

            <div>
                <label class="block text-white font-bold mb-3">Genre</label>

                <input type="text"
                       name="genre"
                       value="{{ $film->genre }}"
                       class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4">
            </div>

            <div>
                <label class="block text-white font-bold mb-3">Durasi</label>

                <input type="text"
                       name="durasi"
                       value="{{ $film->durasi }}"
                       class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4">
            </div>

            <div>
                <label class="block text-white font-bold mb-3">Jadwal Tayang</label>

                <input type="text"
                       name="jadwal_tayang"
                       value="{{ $film->jadwal_tayang }}"
                        placeholder="Contoh: 13:00, 15:30, 18:00"
                       class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4">
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
                <label class="block text-white font-bold mb-3">Rating</label>

                <input type="text"
                       name="rating"
                       value="{{ $film->rating }}"
                       class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4">
            </div>

            <div>
                <label class="block text-white font-bold mb-3">Status Tayang</label>

                <select name="status_tayang"
                        class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4">

                    <option class="text-black"
                        value="Sedang Tayang"
                        {{ $film->status_tayang == 'Sedang Tayang' ? 'selected' : '' }}>
                        Sedang Tayang
                    </option>

                    <option class="text-black"
                        value="Akan Tayang"
                        {{ $film->status_tayang == 'Akan Tayang' ? 'selected' : '' }}>
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
                      class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4">{{ $film->sinopsis }}</textarea>
        </div>

        @if($film->poster)
            <img src="{{ asset('storage/' . $film->poster) }}"
                 class="w-44 rounded-3xl mt-8 shadow-xl">
        @endif

        <div class="mt-8">
            <label class="block text-white font-bold mb-3">
                Ganti Poster Film
            </label>

            <input type="file"
                   name="poster"
                   class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4">
        </div>

        <div class="flex gap-5 mt-10">

            <button
                class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition hover:scale-105">

                Update Film

            </button>

            <a href="/film"
               class="bg-white/10 hover:bg-white/20 border border-white/10 text-white px-8 py-4 rounded-2xl font-black transition">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection