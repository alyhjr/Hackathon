<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'category',
        'badge_label',
        'excerpt',
        'content',
        'image',
        'source_url',
        'published_at',
        'sort_order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_active'    => 'boolean',
        'is_featured'  => 'boolean',
    ];

    /**
     * Scope: hanya yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: featured / highlight
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Format tanggal tayang ke bahasa Indonesia
     */
    public function getFormattedDateAttribute(): string
    {
        if (!$this->published_at) return '';

        $bulan = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Ags',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des',
        ];

        return $this->published_at->format('d') . ' '
            . ($bulan[(int) $this->published_at->format('n')] ?? '')
            . ' ' . $this->published_at->format('Y');
    }

    /**
     * URL gambar (fallback ke placeholder)
     */
    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : '';
    }
}