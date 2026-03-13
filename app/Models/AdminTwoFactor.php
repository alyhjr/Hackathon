<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminTwoFactor extends Model
{
    protected $fillable = ['user_id', 'secret', 'is_confirmed'];

    protected $casts = ['is_confirmed' => 'boolean'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}