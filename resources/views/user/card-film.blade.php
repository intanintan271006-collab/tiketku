<div class="film-card min-w-[340px] max-w-[340px] group"
     data-title="{{ $film->judul }}">

    <div class="relative rounded-[32px] overflow-hidden shadow-2xl bg-white/10">

        @if($film->poster)
            <img src="{{ asset('storage/' . $film->poster) }}"
                 class="w-full h-[470px] object-cover group-hover:scale-105 transition duration-500">
        @else
            <div class="w-full h-[470px] bg-purple-900 flex items-center justify-center text-7xl">
                🎬
            </div>
        @endif


    </div>

    <div class="mt-6">

        <h2 class="text-3xl font-black text-white leading-tight uppercase">
            {{ $film->judul }}
        </h2>

        @if($film->status_tayang == 'Sedang Tayang')

            <p class="text-gray-300 mt-3 text-lg leading-relaxed">
                Dengan rating
                <span class="text-yellow-300 font-black">⭐ {{ $film->rating ?? '-' }}</span>,
                film ini cocok banget buat jadi pilihan nonton kamu.
            </p>

            <div class="flex gap-3 mt-5">
                <a href="/detail-film/{{ $film->id_film }}"
                   class="flex-1 bg-white/10 hover:bg-white/20 border border-white/10 text-white text-center py-3 rounded-2xl font-black">
                    Detail
                </a>

                <a href="/pesan/{{ $film->id_film }}"
                   class="flex-1 bg-pink-500 hover:bg-pink-600 text-white text-center py-3 rounded-2xl font-black">
                    Pesan
                </a>
            </div>

        @else


            <p class="text-sky-300 mt-3 text-lg">
                Tanggal rilis: {{ $film->jadwal_tayang }}
            </p>

        @endif

    </div>

</div>