<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Peserta extends Authenticatable
{
    protected $table = 'peserta';

    protected $fillable = [
        'nuptk',
        'tanggal_lahir',
        'nama',
        'sekolah',
        'email',
        'kota',
        'provinsi',
        'status',
        'password',
    ];

    protected $hidden = ['password', 'remember_token'];
}