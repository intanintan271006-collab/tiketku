<div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-[30px] overflow-hidden shadow-2xl hover:scale-[1.03] transition">

    @if($film->poster)
        <img src="{{ asset('storage/' . $film->poster) }}"
             class="w-full h-[380px] object-cover">
    @else
        <div class="w-full h-[380px] bg-purple-900 flex items-center justify-center text-6xl">
            🎬
        </div>
    @endif

    <div class="p-6">
        <div class="flex items-center justify-between mb-3">
            <span class="bg-pink-500/20 text-pink-300 px-3 py-1 rounded-full text-sm font-bold">
                {{ $film->status_tayang }}
            </span>

            <span class="text-yellow-300 font-bold">
                ⭐ {{ $film->rating ?? '-' }}
            </span>
        </div>

        <h2 class="text-2xl font-black text-white mb-2">
            {{ $film->judul }}
        </h2>

        <p class="text-gray-300 mb-1">🎭 {{ $film->genre ?? 'Belum ada genre' }}</p>
        <p class="text-gray-300 mb-1">⏱ {{ $film->durasi }}</p>
        <p class="text-gray-300 mb-5">📅 {{ $film->jadwal_tayang }}</p>

        <div class="flex gap-3 mb-3">
            <a href="/film/{{ $film->id_film }}"
               class="flex-1 bg-pink-500 hover:bg-pink-600 text-white text-center py-3 rounded-2xl font-bold">
                Detail
            </a>

            <a href="/film/{{ $film->id_film }}/edit"
               class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-3 rounded-2xl font-bold">
                Edit
            </a>
        </div>

        <form action="/film/{{ $film->id_film }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl font-bold">
                Hapus Film
            </button>
        </form>
    </div>
</div>