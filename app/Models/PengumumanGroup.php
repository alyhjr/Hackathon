<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengumumanGroup extends Model
{
    protected $fillable = [
        'pengumuman_id',
        'title',
        'subtitle',
        'slug',
        'sort_order',
        'is_active'
    ];

    public function pengumuman()
    {
        return $this->belongsTo(Pengumuman::class);
    }

    public function entries()
    {
        return $this->hasMany(PengumumanEntry::class);
    }
}