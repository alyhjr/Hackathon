<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiPenting extends Model
{
    protected $table = 'informasi_penting';

    protected $fillable = [
        'content',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}