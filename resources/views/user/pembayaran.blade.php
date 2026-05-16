@extends('layouts.user')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-10">
        <h1 class="text-6xl font-black">
            Metode <span class="text-pink-400">Pembayaran</span>
        </h1>

        <p class="text-gray-300 mt-4 text-xl">
            Pilih QRIS atau Transfer Bank untuk menyelesaikan pembayaran.
        </p>
    </div>

    <div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-[40px] p-10 shadow-2xl">

        <form action="/pembayaran-user/{{ $pembayaran->id_pembayaran }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <label class="cursor-pointer">
                    <input type="radio"
                           name="metode_pembayaran"
                           value="QRIS"
                           class="hidden peer"
                           onclick="pilihMetode('qris')"
                           required>

                    <div class="bg-white/5 border border-white/10 peer-checked:border-pink-500 peer-checked:bg-pink-500/20 rounded-3xl p-7 transition">
                        <h2 class="text-3xl font-black text-white">QRIS</h2>
                        <p class="text-gray-300 mt-2">
                            Bayar menggunakan QRIS dari e-wallet atau mobile banking.
                        </p>
                    </div>
                </label>

                <label class="cursor-pointer">
                    <input type="radio"
                           name="metode_pembayaran"
                           value="Transfer Bank"
                           class="hidden peer"
                           onclick="pilihMetode('transfer')"
                           required>

                    <div class="bg-white/5 border border-white/10 peer-checked:border-pink-500 peer-checked:bg-pink-500/20 rounded-3xl p-7 transition">
                        <h2 class="text-3xl font-black text-white">Transfer Bank</h2>
                        <p class="text-gray-300 mt-2">
                            Pilih bank lalu gunakan nomor Virtual Account.
                        </p>
                    </div>
                </label>

            </div>

            <!-- QRIS -->
            <div id="boxQris" class="hidden mt-8 bg-white/5 border border-white/10 rounded-3xl p-8 text-center">
                <h2 class="text-3xl font-black text-white mb-4">
                    Scan QRIS
                </h2>

                @php
                    $qrisData = 'TiketKu Payment | ID Pembayaran: ' . $pembayaran->id_pembayaran .
                                ' | Total: ' . $pembayaran->total_pembayaran;

                    $qrisUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=' . urlencode($qrisData);
                @endphp

                <div class="bg-white inline-block p-5 rounded-3xl shadow-xl">
                    <img src="{{ $qrisUrl }}" class="w-56 h-56">
                </div>

                <p class="text-gray-300 mt-5">
                    Scan QRIS ini menggunakan aplikasi pembayaran kamu.
                </p>
            </div>

            <!-- TRANSFER BANK -->
            <div id="boxTransfer" class="hidden mt-8 bg-white/5 border border-white/10 rounded-3xl p-8">

                <h2 class="text-3xl font-black text-white mb-5">
                    Pilih Bank
                </h2>

                <select name="bank"
                        id="bank"
                        onchange="pilihBank()"
                        class="w-full bg-white/10 border border-white/10 text-white rounded-2xl px-5 py-4 outline-none">

                    <option class="text-black" value="">-- Pilih Bank --</option>
                    <option class="text-black" value="BCA">BCA</option>
                    <option class="text-black" value="BRI">BRI</option>
                    <option class="text-black" value="BNI">BNI</option>
                    <option class="text-black" value="Mandiri">Mandiri</option>

                </select>

                <div id="boxVA" class="hidden mt-6 bg-black/20 border border-white/10 rounded-3xl p-7">

                    <p class="text-gray-300 mb-2">
                        Nomor Virtual Account
                    </p>

                    <h2 id="nomorVA" class="text-4xl font-black text-pink-300 tracking-wider">
                        -
                    </h2>

                    <p class="text-gray-300 mt-4">
                        Gunakan nomor Virtual Account ini untuk melakukan pembayaran.
                    </p>

                </div>

            </div>

            <!-- TOTAL -->
            <div class="bg-white/5 border border-white/10 rounded-3xl p-7 mt-8">
                <p class="text-gray-300 mb-2">
                    Total Pembayaran
                </p>

                <h2 class="text-5xl font-black text-pink-300">
                    Rp {{ number_format($pembayaran->total_pembayaran, 0, ',', '.') }}
                </h2>
            </div>

            <div class="flex gap-5 mt-10">

                <button
                    class="flex-1 bg-pink-500 hover:bg-pink-600 text-white py-5 rounded-3xl font-black text-xl shadow-2xl transition hover:scale-105">
                    Bayar Sekarang
                </button>

                <a href="/tiket-saya"
                   class="bg-white/10 hover:bg-white/20 border border-white/10 text-white px-8 py-5 rounded-3xl font-black text-xl transition">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

<script>
    const idPembayaran = "{{ $pembayaran->id_pembayaran }}";
    const idPembeli = "{{ $pembayaran->id_pembeli }}";

    function pilihMetode(metode) {
        document.getElementById('boxQris').classList.add('hidden');
        document.getElementById('boxTransfer').classList.add('hidden');

        if (metode === 'qris') {
            document.getElementById('boxQris').classList.remove('hidden');
        }

        if (metode === 'transfer') {
            document.getElementById('boxTransfer').classList.remove('hidden');
        }
    }

    function pilihBank() {
        let bank = document.getElementById('bank').value;
        let prefix = '';

        if (bank === 'BCA') prefix = '3901';
        if (bank === 'BRI') prefix = '8808';
        if (bank === 'BNI') prefix = '9888';
        if (bank === 'Mandiri') prefix = '7001';

        if (bank !== '') {
            let nomorVA = prefix + idPembayaran.padStart(4, '0') + idPembeli.padStart(4, '0');

            document.getElementById('nomorVA').innerText = nomorVA;
            document.getElementById('boxVA').classList.remove('hidden');
        } else {
            document.getElementById('boxVA').classList.add('hidden');
        }
    }
</script>

@endsection