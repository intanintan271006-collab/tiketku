<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $primaryKey = 'id_pembeli';

    protected $fillable = [
        'nama',
        'password',
        'username',
        'email',
        'no_telp',
    ];
}