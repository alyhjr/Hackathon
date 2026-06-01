<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesertaSubmission extends Model
{
    protected $fillable = [
        'nama_tim',
    'kategori',
    'asal_sekolah',
    'kota_kabupaten',

    'anggota_1',
    'anggota_2',
    'anggota_3',

    'proposal_file',
    'karya_file',
    ];
}