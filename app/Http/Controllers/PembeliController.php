<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;

class PembeliController extends Controller
{
    public function index()
    {
        $pembelis = Pembeli::all();
        return view('pembeli.index', compact('pembelis'));
    }

    public function create()
    {
        return view('pembeli.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'password' => 'required',
        'username' => 'required',
        'email' => 'required',
        'no_telp' => 'required',
        ]);

        Pembeli::create($request->all());
        return redirect('/pembeli')->with('success', 'Data pembeli berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
        'nama' => 'required',
        'password' => 'required',
        'username' => 'required',
        'email' => 'required',
        'no_telp' => 'required',
        ]);

        $pembeli = Pembeli::findOrFail($id);
        $pembeli->update($request->all());
        return redirect('/pembeli')->with('success', 'Data pembeli berhasil diupdate');
    }

    public function destroy($id)
    {
       Pembeli::findOrFail($id)->delete();

    return redirect('/pembeli')->with('success', 'Data pembeli berhasil dihapus');
    }
}