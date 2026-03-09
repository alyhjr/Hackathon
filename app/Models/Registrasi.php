<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $table = 'registrasi';

    protected $fillable = [
        'nuptk',
        'tgl_lahir',
        'nama',
        'sekolah',
        'provinsi',
        'no_tlp',
        'email',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
    ];
}