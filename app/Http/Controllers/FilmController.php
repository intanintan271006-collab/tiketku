<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('film.index', compact('films'));
    }

    public function show($id)
{
    $film = Film::findOrFail($id);

    return view('film.show', compact('film'));
}

    public function create()
    {
        return view('film.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'durasi' => 'required',
            'jadwal_tayang' => 'required',
            'studio' => 'required',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'genre' => 'nullable',
            'rating' => 'nullable',
            'sinopsis' => 'nullable',
            'trailer' => 'nullable',
        ]);

        $film = new Film();

        $film->judul = $request->judul;
        $film->durasi = $request->durasi;
        $film->jadwal_tayang = $request->jadwal_tayang;
        $film->studio = $request->studio;
        $film->genre = $request->genre;
        $film->rating = $request->rating;
        $film->sinopsis = $request->sinopsis;
        $film->trailer = $request->trailer;
        $film->status_tayang = $request->status_tayang;

        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('poster', 'public');
            $film->poster = $path;
        }

        $film->save();

        return redirect('/film')->with('success', 'Film berhasil ditambahkan');
    }

    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('film.edit', compact('film'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'durasi' => 'required',
            'jadwal_tayang' => 'required',
            'studio' => 'required',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'genre' => 'nullable',
            'rating' => 'nullable',
            'sinopsis' => 'nullable',
            'trailer' => 'nullable',
        ]);

        $film = Film::findOrFail($id);

        $film->judul = $request->judul;
        $film->durasi = $request->durasi;
        $film->jadwal_tayang = $request->jadwal_tayang;
        $film->studio = $request->studio;
        $film->genre = $request->genre;
        $film->rating = $request->rating;
        $film->sinopsis = $request->sinopsis;
        $film->trailer = $request->trailer;
        $film->status_tayang = $request->status_tayang;

        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('poster', 'public');
            $film->poster = $path;
        }

        $film->save();

        return redirect('/film')->with('success', 'Film berhasil diupdate');
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect('/film')->with('success', 'Film berhasil dihapus');
    }
}