<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\Pembeli;
use App\Models\Pembayaran;
use App\Models\Tiket;


class UserController extends Controller
{
    public function index()
    {
        $films = Film::all();

        return view('user.beranda', compact('films'));
    }

    public function show($id)
    {
        $film = Film::findOrFail($id);

        return view('user.detail', compact('film'));
    }

    public function pesan($id)
{
    if (!session()->has('pembeli_id')) {
        return redirect('/login-pembeli')
            ->with('error', 'Silakan login dulu');
    }

    $film = Film::findOrFail($id);

    $filmSatuStudio = Film::where('studio', $film->studio)
        ->pluck('id_film')
        ->toArray();

    $tikets = Tiket::whereIn('id_film', $filmSatuStudio)->get();

    $kursiTerisiByJadwal = [];

    foreach ($tikets as $tiket) {
        $jadwal = trim($tiket->jadwal_film);
        $kursis = explode(',', $tiket->no_kursi);

        foreach ($kursis as $kursi) {
            $kursiTerisiByJadwal[$jadwal][] = trim($kursi);
        }
    }

    return view('user.pesan', compact('film', 'kursiTerisiByJadwal'));
}

    public function register()
{
    return view('user.register');
}

public function storeRegister(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'username' => 'required',
        'password' => 'required',
        'email' => 'required',
        'no_telp' => 'required',
    ]);

    Pembeli::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'password' => $request->password,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
    ]);

    return redirect('/login-pembeli')->with('success', 'Registrasi berhasil, silakan login');
}

public function loginPembeli()
{
    return view('user.login');
}

public function prosesLoginPembeli(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $pembeli = Pembeli::where('username', $request->username)
        ->where('password', $request->password)
        ->first();

    if ($pembeli) {
        session([
            'pembeli_id' => $pembeli->id_pembeli,
            'pembeli_nama' => $pembeli->nama,
        ]);

        return redirect('/beranda')->with('success', 'Login berhasil');
    }

    return redirect('/login-pembeli')->with('error', 'Username atau password salah');
}

public function logoutPembeli()
{
    session()->forget(['pembeli_id', 'pembeli_nama']);

    return redirect('/login-pembeli')->with('success', 'Logout berhasil');
}

public function tiketSaya()
{
    if (!session()->has('pembeli_id')) {
        return redirect('/login-pembeli');
    }

    $pembeliId = session('pembeli_id');

    $pembayarans = Pembayaran::where('id_pembeli', $pembeliId)
        ->latest()
        ->get();

    return view('user.tiket-saya', compact('pembayarans'));
}

public function pilihPembayaran($id)
{
    if (!session()->has('pembeli_id')) {
        return redirect('/login-pembeli');
    }

    $pembayaran = Pembayaran::findOrFail($id);

    if ($pembayaran->id_pembeli != session('pembeli_id')) {
        abort(403);
    }

    return view('user.pembayaran', compact('pembayaran'));
}

public function prosesPembayaran(Request $request, $id)
{
    $request->validate([
        'metode_pembayaran' => 'required',
    ]);

    $pembayaran = Pembayaran::findOrFail($id);

    if ($pembayaran->id_pembeli != session('pembeli_id')) {
        abort(403);
    }

    if ($request->metode_pembayaran == 'Transfer Bank') {
        $request->validate([
            'bank' => 'required',
        ]);

        $pembayaran->metode_pembayaran = 'Transfer Bank - ' . $request->bank;
    } else {
        $pembayaran->metode_pembayaran = 'QRIS';
    }

    $pembayaran->status = 'Sudah Bayar';
    $pembayaran->save();

    return redirect('/tiket-saya')->with('success', 'Pembayaran berhasil');
}

public function eticket($id)
{
    if (!session()->has('pembeli_id')) {
        return redirect('/login-pembeli');
    }

    $pembayaran = Pembayaran::with(['pembeli', 'tiket.film'])
        ->findOrFail($id);

    if ($pembayaran->id_pembeli != session('pembeli_id')) {
        abort(403);
    }

    $tiket = $pembayaran->tiket;

    return view('user.eticket', compact('pembayaran', 'tiket'));
}

public function simpanTiket(Request $request)
{
    if (!session()->has('pembeli_id')) {
        return redirect('/login-pembeli');
    }

    $request->validate([
        'id_film' => 'required',
        'jadwal_film' => 'required',
        'no_kursi' => 'required',
        'harga' => 'required',
    ]);

    $film = Film::findOrFail($request->id_film);

    $filmSatuStudio = Film::where('studio', $film->studio)
        ->pluck('id_film')
        ->toArray();

    $tiketLama = Tiket::whereIn('id_film', $filmSatuStudio)
        ->where('jadwal_film', $request->jadwal_film)
        ->pluck('no_kursi')
        ->toArray();

    $kursiTerpakai = [];

    foreach ($tiketLama as $kursi) {
        $explode = explode(',', $kursi);

        foreach ($explode as $k) {
            $kursiTerpakai[] = trim($k);
        }
    }

    $kursiDipilih = explode(',', $request->no_kursi);

    foreach ($kursiDipilih as $kursiBaru) {
        if (in_array(trim($kursiBaru), $kursiTerpakai)) {
            return redirect()->back()->with(
                'error',
                'Kursi ' . trim($kursiBaru) . ' sudah dipesan pada jadwal tersebut'
            );
        }
    }

    $tiket = Tiket::create([
        'id_admin' => 1,
        'id_film' => $request->id_film,
        'id_pembeli' => session('pembeli_id'),
        'jadwal_film' => $request->jadwal_film,
        'no_kursi' => $request->no_kursi,
        'harga' => $request->harga,
    ]);

    $pembayaran = Pembayaran::create([
        'id_pembeli' => session('pembeli_id'),
        'id_tiket' => $tiket->id_tiket,
        'metode_pembayaran' => 'Belum Dipilih',
        'status' => 'Belum Bayar',
        'total_pembayaran' => $request->harga,
    ]);

    return redirect('/pembayaran-user/' . $pembayaran->id_pembayaran);
}
}