<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'password_admin',
        'username_admin',
        'email_admin',
        'no_telp_admin',
        'nama_admin',
    ];
}