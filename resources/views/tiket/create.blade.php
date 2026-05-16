@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-4xl font-bold text-purple-900 mb-2">
        🎟 Pesan Tiket
    </h1>

    <p class="text-gray-500 mb-8">
        Pilih film, pembeli, jadwal, dan kursi bioskop.
    </p>

    <form action="/tiket" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Film</label>
            <select name="id_film" class="w-full border border-gray-200 rounded-2xl px-5 py-3">
                @foreach($films as $film)
                    <option value="{{ $film->id_film }}">{{ $film->judul }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Pembeli</label>
            <select name="id_pembeli" class="w-full border border-gray-200 rounded-2xl px-5 py-3">
                @foreach($pembelis as $pembeli)
                    <option value="{{ $pembeli->id_pembeli }}">{{ $pembeli->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Jadwal Film</label>
            <input type="text" name="jadwal_film" placeholder="Contoh: 19:00"
                   class="w-full border border-gray-200 rounded-2xl px-5 py-3">
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-4">Pilih Kursi</label>

            <div class="bg-purple-950 rounded-3xl p-6 text-white">
                <div class="bg-white text-purple-900 text-center py-2 rounded-xl mb-6 font-bold">
                    LAYAR BIOSKOP
                </div>

                <div class="grid grid-cols-6 gap-3 max-w-md mx-auto">

    @foreach(['A','B','C','D'] as $row)

        @for($i = 1; $i <= 6; $i++)

            @php
                $kodeKursi = $row.$i;
                $sudahTerisi = in_array($kodeKursi, $kursiTerisi);
            @endphp

            <button
                type="button"

                @if(!$sudahTerisi)
                    onclick="pilihKursi('{{ $kodeKursi }}', this)"
                @endif

                class="seat py-3 rounded-xl font-bold transition

                {{ $sudahTerisi
                    ? 'bg-red-600 text-white cursor-not-allowed'
                    : 'bg-white/20 hover:bg-pink-500 text-white'
                }}">

                {{ $kodeKursi }}

            </button>

        @endfor

    @endforeach

</div>
            </div>

            <input type="hidden" name="no_kursi" id="no_kursi">

            <p class="mt-3 text-gray-600">
                Kursi dipilih:
                <span id="kursi_terpilih" class="font-bold text-pink-600">Belum memilih</span>
            </p>
        </div>

        <div>
            <label class="block font-semibold text-purple-900 mb-2">Harga</label>
            <input type="text" name="harga" id="harga" readonly
       class="w-full border border-gray-200 rounded-2xl px-5 py-3 bg-gray-100">

       <p class="mt-2 text-gray-600">
        Total Harga:
        <span id="total_harga_tampil" class="font-bold text-pink-600">Rp 0</span>
        </p>
        </div>

        <div class="flex gap-3 pt-4">
            <button class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-2xl font-semibold">
                Simpan Tiket
            </button>

            <a href="/tiket"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-2xl font-semibold">
                Kembali
            </a>
        </div>
    </form>
</div>

<script>
    let kursiDipilih = [];
    const hargaPerKursi = 45000;

    function pilihKursi(kursi, button) {
        if (kursiDipilih.includes(kursi)) {
            kursiDipilih = kursiDipilih.filter(item => item !== kursi);

            button.classList.remove('bg-pink-500');
            button.classList.add('bg-white/20');
        } else {
            kursiDipilih.push(kursi);

            button.classList.remove('bg-white/20');
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