<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $fillable = [
        'type',
        'title',
        'content',
        'sort_order',
        'is_active',
    ];

    // relasi ke group
    public function groups()
    {
        return $this->hasMany(PengumumanGroup::class);
    }
}