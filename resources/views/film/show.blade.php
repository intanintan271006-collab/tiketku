@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

    <div>

        <img src="{{ asset('storage/' . $film->poster) }}"
             class="w-full rounded-3xl shadow-2xl">

    </div>

    <div>

        <div class="mb-4">

            <span class="bg-pink-500 text-white px-4 py-2 rounded-full text-sm font-bold">
                ⭐ {{ $film->rating }}/10
            </span>

        </div>

        <h1 class="text-5xl font-black text-white mb-4">
            {{ $film->judul }}
        </h1>

        <div class="flex gap-3 mb-6">

            <span class="bg-white/20 text-white px-4 py-2 rounded-full">
                🎬 {{ $film->genre }}
            </span>

            <span class="bg-white/20 text-white px-4 py-2 rounded-full">
                ⏱ {{ $film->durasi }}
            </span>

        </div>

        <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-6 mb-8">

            <h2 class="text-2xl font-bold text-white mb-4">
                Sinopsis
            </h2>

            <p class="text-gray-200 leading-8">
                {{ $film->sinopsis }}
            </p>

        </div>

        <div class="flex gap-4">

            <a href="/tiket/create"
               class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-2xl font-bold shadow-xl">

                🎟 Pesan Tiket

            </a>

            <a href="{{ $film->trailer }}"
               target="_blank"
               class="bg-white/20 hover:bg-white/30 text-white px-8 py-4 rounded-2xl font-bold">

                ▶ Trailer

            </a>

        </div>

    </div>

</div>

@endsection