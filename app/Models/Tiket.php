<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Film;
use App\Models\Pembeli;

class Tiket extends Model
{
    protected $primaryKey = 'id_tiket';

    protected $fillable = [
        'id_admin',
        'id_film',
        'id_pembeli',
        'jadwal_film',
        'no_kursi',
        'harga',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class, 'id_film');
    }

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli');
    }
}