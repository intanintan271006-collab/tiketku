<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Pembeli;
use App\Models\Tiket;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahFilm = Film::count();
        $jumlahPembeli = Pembeli::count();
        $jumlahTiket = Tiket::count();
        $jumlahPembayaran = Pembayaran::count();

        return view('dashboard', compact(
            'jumlahFilm',
            'jumlahPembeli',
            'jumlahTiket',
            'jumlahPembayaran'
        ));
    }
}