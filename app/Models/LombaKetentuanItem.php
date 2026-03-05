<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LombaKetentuanItem extends Model
{
    protected $table = 'lomba_ketentuan_items';

    protected $fillable = [
        'tab',
        'title',
        'content',
        'image_path',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}