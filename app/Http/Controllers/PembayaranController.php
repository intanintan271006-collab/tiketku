<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pembeli;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('pembeli')->get();
        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        $pembelis = Pembeli::all();
        return view('pembayaran.create', compact('pembelis'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'id_pembeli' => 'required',
        'metode_pembayaran' => 'required',
        'status' => 'required',
        'total_pembayaran' => 'required',
    ]);

    Pembayaran::create($request->all());

    return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembelis = Pembeli::all();

        return view('pembayaran.edit', compact('pembayaran', 'pembelis'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
        'id_pembeli' => 'required',
        'metode_pembayaran' => 'required',
        'status' => 'required',
        'total_pembayaran' => 'required',
    ]);

    $pembayaran = Pembayaran::findOrFail($id);
    $pembayaran->update($request->all());

    return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil diupdate');
    }

    public function destroy($id)
    {
        Pembayaran::findOrFail($id)->delete();

    return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil dihapus');
    }

    public function bayar($id)
{
    $pembayaran = Pembayaran::findOrFail($id);

    $pembayaran->status = 'Sudah Bayar';

    $pembayaran->save();

    return redirect('/pembayaran')
        ->with('success', 'Pembayaran berhasil');
}

    public function tiket($id)
{
    $pembayaran = Pembayaran::findOrFail($id);

    $tiket = \App\Models\Tiket::where('id_pembeli', $pembayaran->id_pembeli)
                ->latest()
                ->first();

    return view('pembayaran.tiket', compact('pembayaran', 'tiket'));
}
}