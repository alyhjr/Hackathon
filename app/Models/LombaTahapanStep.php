<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LombaTahapanStep extends Model
{
    protected $table = 'lomba_tahapan_steps';

    protected $fillable = [
        'step_number',
        'title',
        'description',
        'sort_order',
        'is_active',
    ];


    protected $casts = [
    'bullets' => 'array',
    'is_active' => 'boolean',
    'step_number' => 'integer',
    'sort_order' => 'integer',
];

}