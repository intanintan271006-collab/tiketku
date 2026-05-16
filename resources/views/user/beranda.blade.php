@extends('layouts.user')

@section('content')

@php
    $sedangTayang = $films->where('status_tayang', 'Sedang Tayang');
    $akanTayang = $films->where('status_tayang', 'Akan Tayang');
@endphp

<div class="max-w-[1550px] mx-auto">

    <!-- HERO -->
    <div class="relative overflow-hidden rounded-[42px] bg-[#12051f]/85 border border-white/10 shadow-2xl p-12 mb-12">

        <div class="absolute inset-0 bg-gradient-to-br from-purple-900/30 via-transparent to-pink-900/30"></div>

        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

            <div>
                <span class="bg-pink-500/20 text-pink-300 px-5 py-3 rounded-full font-black">
                    🎬 TiketKu Cinema
                </span>

                <h1 class="text-7xl font-black leading-tight mt-8">
                    Pesan Tiket Bioskop
                    <span class="text-pink-400">Lebih Mudah</span>
                </h1>

                <p class="text-gray-300 text-xl mt-6 leading-relaxed">
                    Pilih film favorit, lihat jadwal tayang, pilih kursi, dan dapatkan e-ticket secara online.
                </p>

                <p class="text-pink-300 font-bold mt-4 text-xl">
                    📍 Lokasi: CGV Transmart Lampung
                </p>

                <div class="flex flex-wrap gap-5 mt-9">
                    <a href="#sedang-tayang"
                       class="bg-pink-500 hover:bg-pink-600 text-white px-9 py-4 rounded-3xl font-black shadow-xl transition hover:scale-105">
                        🎟 Pesan Sekarang
                    </a>

                    <a href="#akan-tayang"
                       class="bg-white/10 hover:bg-white/20 border border-white/10 text-white px-9 py-4 rounded-3xl font-black transition">
                        Lihat Akan Tayang
                    </a>
                </div>
            </div>

            <div class="hidden lg:block">
                @php
                    $filmHero = $sedangTayang->first() ?? $films->first();
                @endphp

                @if($filmHero && $filmHero->poster)
                    <div class="relative">
                        <div class="absolute inset-0 bg-pink-500/30 blur-3xl rounded-[40px]"></div>

                        <img src="{{ asset('storage/' . $filmHero->poster) }}"
                             class="relative w-full h-[520px] object-cover rounded-[40px] shadow-2xl">

                        <div class="absolute bottom-6 left-6 right-6 bg-black/50 backdrop-blur-xl rounded-3xl p-5">
                            <p class="text-pink-300 font-bold">Film Pilihan</p>
                            <h2 class="text-3xl font-black text-white">
                                {{ $filmHero->judul }}
                            </h2>
                        </div>
                    </div>
                @else
                    <div class="h-[520px] rounded-[40px] bg-white/10 border border-white/10 flex items-center justify-center text-8xl">
                        🎬
                    </div>
                @endif
            </div>

        </div>

    </div>

    <!-- SEARCH -->
    <div class="bg-white/5 border border-white/10 rounded-[30px] p-6 mb-12">
        <input type="text"
               id="searchFilm"
               onkeyup="cariFilm()"
               placeholder="Cari film berdasarkan judul..."
               class="w-full bg-white/10 border border-white/10 text-white placeholder-gray-400 rounded-2xl px-6 py-4 outline-none focus:ring-2 focus:ring-pink-500">
    </div>

    <!-- SEDANG TAYANG -->
    <section id="sedang-tayang" class="mb-16">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-5xl font-black text-white">
                    Sedang <span class="text-pink-400">Tayang</span>
                </h2>

                <p class="text-gray-300 mt-3 text-lg">
                    Film yang sedang tersedia di bioskop.
                </p>
            </div>
        </div>

        <div class="flex gap-8 overflow-x-auto pb-6 scrollbar-hide">

            @forelse($sedangTayang as $film)

                @include('user.card-film', ['film' => $film])

            @empty

                <div class="col-span-full bg-white/5 border border-white/10 rounded-3xl p-10 text-center">
                    <h2 class="text-2xl font-black text-white">Belum Ada Film Sedang Tayang</h2>
                    <p class="text-gray-300 mt-2">Film akan muncul setelah admin menambahkan data.</p>
                </div>

            @endforelse

        </div>

    </section>

    <!-- PROMO -->
    <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-pink-600 to-purple-800 p-10 mb-16 shadow-2xl">

        <div class="absolute right-10 top-4 text-[120px] opacity-20">🍿</div>

        <div class="relative z-10">
            <h2 class="text-4xl font-black text-white">
                Promo Weekend TiketKu
            </h2>

            <p class="text-pink-100 mt-3 text-lg">
                Pesan tiket lebih mudah dan nikmati pengalaman bioskop modern bersama TiketKu.
            </p>
        </div>

    </div>

    <!-- AKAN TAYANG -->
    <section id="akan-tayang">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-5xl font-black text-white">
                    Akan <span class="text-pink-400">Tayang</span>
                </h2>

                <p class="text-gray-300 mt-3 text-lg">
                    Film yang segera hadir di bioskop.
                </p>
            </div>
        </div>

        <div class="flex gap-8 overflow-x-auto pb-8 scrollbar-hide">

            @forelse($akanTayang as $film)

                @include('user.card-film', ['film' => $film])

            @empty

                <div class="col-span-full bg-white/5 border border-white/10 rounded-3xl p-10 text-center">
                    <h2 class="text-2xl font-black text-white">Belum Ada Film Akan Tayang</h2>
                    <p class="text-gray-300 mt-2">Film akan muncul setelah admin menambahkan data.</p>
                </div>

            @endforelse

        </div>

    </section>

</div>

<script>
    function cariFilm() {
        let input = document.getElementById('searchFilm').value.toLowerCase();
        let cards = document.querySelectorAll('.film-card');

        cards.forEach(card => {
            let title = card.getAttribute('data-title').toLowerCase();

            if (title.includes(input)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

@endsection