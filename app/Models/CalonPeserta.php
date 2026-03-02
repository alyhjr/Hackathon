<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPeserta extends Model
{
    use HasFactory;

    protected $table = 'calon_pesertas';

    protected $fillable = [
        'nuptk',
        'tanggal_lahir',
        'nama',
        'npsn',
        'no_telp',
        'email',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}