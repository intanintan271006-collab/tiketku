@extends('layouts.user')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="mb-10">

        <h1 class="text-6xl font-black">
            Pesan Tiket <span class="text-pink-400">{{ $film->judul }}</span>
        </h1>

        <p class="text-gray-300 mt-4 text-xl">
            Pilih jadwal tayang dan kursi bioskop untuk melanjutkan pemesanan tiket.
        </p>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- Poster Film -->
        <div>

            @if($film->poster)

                <img src="{{ asset('storage/' . $film->poster) }}"
                     class="w-full h-[750px] object-cover rounded-[40px] shadow-2xl">

            @else

                <div class="w-full h-[750px] bg-purple-900 rounded-[40px] flex items-center justify-center text-8xl">
                    🎬
                </div>

            @endif

        </div>

        <!-- Form -->
        <div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-[40px] p-10 shadow-2xl">

            <form action="/pesan-tiket" method="POST" class="space-y-7">

                @csrf

                <input type="hidden" name="id_film" value="{{ $film->id_film }}">
                

                <!-- Nama Pembeli -->
                <div>

                    <label class="block font-black mb-3 text-lg">
                        Nama Pembeli
                    </label>

                    <div class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white font-bold">
                        {{ session('pembeli_nama') }}
                    </div>

                </div>

                <!-- Detail Film -->
<div class="grid grid-cols-3 gap-5">

    <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
        <p class="text-gray-300 mb-2">Genre</p>

        <h2 class="text-xl font-black">
            {{ $film->genre ?? '-' }}
        </h2>
    </div>

    <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
        <p class="text-gray-300 mb-2">Durasi</p>

        <h2 class="text-xl font-black">
            {{ $film->durasi ?? '-' }}
        </h2>
    </div>

    <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
        <p class="text-gray-300 mb-2">Studio</p>

        <h2 class="text-xl font-black">
            🎬 {{ $film->studio ?? '-' }}
        </h2>
    </div>

</div>

                <!-- PILIH JADWAL -->
                <div>

                    <label class="block font-black mb-4 text-lg">
                        Pilih Jadwal Tayang
                    </label>

                    @php
                        $jadwals = explode(',', $film->jadwal_tayang);
                    @endphp

                    <div class="grid grid-cols-2 gap-4">

                        @foreach($jadwals as $jadwal)

                            <label class="cursor-pointer">

                                <input type="radio"
                                    name="jadwal_film"
                                    value="{{ trim($jadwal) }}"
                                    class="hidden peer"
                                    onclick="pilihJadwal('{{ trim($jadwal) }}')"
                                    required>

                                <div class="bg-white/10 border border-white/10 peer-checked:bg-pink-500 peer-checked:border-pink-400 rounded-2xl p-5 text-center font-black text-white transition">

                                    {{ trim($jadwal) }}

                                </div>

                            </label>

                        @endforeach

                    </div>

                </div>

                <!-- PILIH KURSI -->
                <div>

                    <label class="block font-black mb-4 text-lg">
                        Pilih Kursi
                    </label>

                    <div class="bg-[#1b0b3d] rounded-[30px] p-7 border border-white/10">

                        <div class="bg-white text-purple-900 text-center py-3 rounded-2xl mb-8 font-black tracking-widest">
                            LAYAR BIOSKOP
                        </div>

                        <div class="grid grid-cols-6 gap-3 max-w-md mx-auto">

                            @foreach(['A','B','C','D'] as $row)

                                @for($i = 1; $i <= 6; $i++)

                                    @php
                                        $kodeKursi = $row . $i;
                                        $sudahTerisi = in_array($kodeKursi, $kursiTerisi ?? []);
                                    @endphp

                                    @if($sudahTerisi)

                                        <button type="button"
                                                disabled
                                                class="bg-red-500/80 text-white py-3 rounded-xl font-black cursor-not-allowed opacity-80">

                                            {{ $kodeKursi }}

                                        </button>

                                    @else

                                        <button type="button"
                                                data-kursi="{{ $kodeKursi }}"
                                                onclick="pilihKursi('{{ $kodeKursi }}', this)"
                                                class="seat bg-white/10 hover:bg-pink-500 text-white py-3 rounded-xl font-black transition">

                                            {{ $kodeKursi }}

                                        </button>

                                    @endif

                                @endfor

                            @endforeach

                        </div>

                        <!-- Legend -->
                        <div class="flex justify-center gap-5 mt-7 text-sm font-bold">

                            <div class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded bg-white/20"></span>
                                <span class="text-gray-300">Tersedia</span>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded bg-pink-500"></span>
                                <span class="text-gray-300">Dipilih</span>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded bg-red-500"></span>
                                <span class="text-gray-300">Terisi</span>
                            </div>

                        </div>

                    </div>

                    <input type="hidden" name="no_kursi" id="no_kursi">

                    <p class="mt-4 text-gray-300">

                        Kursi dipilih:
                        <span id="kursi_terpilih" class="font-black text-pink-300">
                            Belum memilih
                        </span>

                    </p>

                </div>

                <!-- HARGA -->
                <div>

                    <label class="block font-black mb-3 text-lg">
                        Total Harga
                    </label>

                    <input type="text"
                           name="harga"
                           id="harga"
                           readonly
                           class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white font-black text-xl">

                    <p class="mt-3 text-gray-300">

                        Total:
                        <span id="total_harga_tampil" class="font-black text-pink-300">
                            Rp 0
                        </span>

                    </p>

                </div>

                <!-- BUTTON -->
                <div class="flex gap-5 pt-5">

                    <button
                        class="flex-1 bg-pink-500 hover:bg-pink-600 text-white py-5 rounded-3xl font-black text-xl shadow-2xl transition hover:scale-105">

                        🎟 Pesan Sekarang

                    </button>

                    <a href="/beranda"
                       class="bg-white/10 hover:bg-white/20 border border-white/10 text-white px-8 py-5 rounded-3xl font-black text-xl transition">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    let kursiDipilih = [];
    const hargaPerKursi = 50000;

    const kursiTerisiByJadwal = @json($kursiTerisiByJadwal);

    function pilihJadwal(jadwal) {
        kursiDipilih = [];

        document.getElementById('no_kursi').value = '';
        document.getElementById('kursi_terpilih').innerText = 'Belum memilih';
        document.getElementById('harga').value = 0;
        document.getElementById('total_harga_tampil').innerText = 'Rp 0';

        document.querySelectorAll('.seat').forEach(button => {
            let kursi = button.getAttribute('data-kursi');

            button.disabled = false;
            button.className = 'seat bg-white/10 hover:bg-pink-500 text-white py-3 rounded-xl font-black transition';

            if (kursiTerisiByJadwal[jadwal] && kursiTerisiByJadwal[jadwal].includes(kursi)) {
                button.disabled = true;
                button.className = 'seat bg-red-500/80 text-white py-3 rounded-xl font-black cursor-not-allowed opacity-80';
            }
        });
    }

    function pilihKursi(kursi, button) {
        if (button.disabled) return;

        if (kursiDipilih.includes(kursi)) {
            kursiDipilih = kursiDipilih.filter(item => item !== kursi);

            button.classList.remove('bg-pink-500');
            button.classList.add('bg-white/10');
        } else {
            kursiDipilih.push(kursi);

            button.classList.remove('bg-white/10');
            button.classList.add('bg-pink-500');
        }

        document.getElementById('no_kursi').value = kursiDipilih.join(', ');

        document.getElementById('kursi_terpilih').innerText =
            kursiDipilih.length > 0 ? kursiDipilih.join(', ') : 'Belum memilih';

        let totalHarga = kursiDipilih.length * hargaPerKursi;

        document.getElementById('harga').value = totalHarga;

        document.getElementById('total_harga_tampil').innerText =
            'Rp ' + totalHarga.toLocaleString('id-ID');
    }
</script>

@endsection