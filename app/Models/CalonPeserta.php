<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalonPeserta extends Authenticatable
{
    use HasFactory, Notifiable;

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

    protected $hidden = ['remember_token'];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}