<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengumumanEntry extends Model
{
    protected $fillable = [
        'pengumuman_group_id',
        'team_name',
        'school_name',
        'rank_order',
        'sort_order',
        'is_preview',
        'is_active'
    ];

    public function group()
    {
        return $this->belongsTo(PengumumanGroup::class, 'pengumuman_group_id');
    }
}