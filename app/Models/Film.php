<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $primaryKey = 'id_film';

    protected $fillable = [
        'judul',
        'durasi',
        'jadwal_tayang',
        'status_tayang',
        'poster',
        'genre',
        'rating',
        'sinopsis',
        'trailer',
        'studio',
    ];
}