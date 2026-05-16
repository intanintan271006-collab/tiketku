<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Film;
use App\Models\Pembeli;
use App\Models\Pembayaran;

class TiketController extends Controller
{
    public function index()
    {
        $tikets = Tiket::with(['film', 'pembeli'])->get();

        return view('tiket.index', compact('tikets'));
    }

    public function create()
    {
        $films = Film::all();
        $pembelis = Pembeli::all();

        $kursiTerisi = Tiket::pluck('no_kursi')->toArray();

        $kursiTerisi = implode(', ', $kursiTerisi);
        $kursiTerisi = explode(', ', $kursiTerisi);

        return view('tiket.create', compact(
            'films',
            'pembelis',
            'kursiTerisi'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_film' => 'required',
            'id_pembeli' => 'required',
            'jadwal_film' => 'required',
            'no_kursi' => 'required',
            'harga' => 'required',
        ]);

        /*
        |--------------------------------------------------------------------------
        | VALIDASI KURSI DOUBLE
        |--------------------------------------------------------------------------
        */

        $kursiDipilih = explode(',', $request->no_kursi);

        $tiketLama = Tiket::where('id_film', $request->id_film)
            ->pluck('no_kursi')
            ->toArray();

        $kursiTerpakai = [];

        foreach ($tiketLama as $kursi)
        {
            $explode = explode(',', $kursi);

            foreach ($explode as $k)
            {
                $kursiTerpakai[] = trim($k);
            }
        }

        foreach ($kursiDipilih as $kursiBaru)
        {
            if (in_array(trim($kursiBaru), $kursiTerpakai))
            {
                return redirect()->back()->with(
                    'error',
                    'Kursi ' . trim($kursiBaru) . ' sudah dipesan'
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN TIKET
        |--------------------------------------------------------------------------
        */

        $tiket = Tiket::create([
            'id_admin' => 1,
            'id_film' => $request->id_film,
            'id_pembeli' => $request->id_pembeli,
            'jadwal_film' => $request->jadwal_film,
            'no_kursi' => $request->no_kursi,
            'harga' => $request->harga,
        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        Pembayaran::create([
            'id_pembeli' => $request->id_pembeli,
            'id_tiket' => $tiket->id_tiket,
            'metode_pembayaran' => 'Belum Dipilih',
            'status' => 'Belum Bayar',
            'total_pembayaran' => $request->harga,
        ]);

        return redirect('/tiket-saya')->with(
            'success',
            'Tiket berhasil dipesan, silakan lakukan pembayaran'
        );
    }

    public function edit($id)
    {
        $tiket = Tiket::findOrFail($id);

        $films = Film::all();
        $pembelis = Pembeli::all();

        return view('tiket.edit', compact(
            'tiket',
            'films',
            'pembelis'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_film' => 'required',
            'id_pembeli' => 'required',
            'jadwal_film' => 'required',
            'no_kursi' => 'required',
            'harga' => 'required',
        ]);

        $tiket = Tiket::findOrFail($id);

        $tiket->update([
            'id_admin' => 1,
            'id_film' => $request->id_film,
            'id_pembeli' => $request->id_pembeli,
            'jadwal_film' => $request->jadwal_film,
            'no_kursi' => $request->no_kursi,
            'harga' => $request->harga,
        ]);

        return redirect('/tiket')->with(
            'success',
            'Data tiket berhasil diupdate'
        );
    }

    public function destroy($id)
    {
        Tiket::findOrFail($id)->delete();

        return redirect('/tiket')->with(
            'success',
            'Data tiket berhasil dihapus'
        );
    }
}