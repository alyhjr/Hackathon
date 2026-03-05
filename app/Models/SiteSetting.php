<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_tagline',
        'primary_button_text',
        'primary_button_url',
        'secondary_button_text',
        'secondary_button_url',
        'youtube_url',
        'home_description',
        'hero_image',
        'hero_image-1',
        'hero_image-2',
        'hero_image-3',
    ];
}