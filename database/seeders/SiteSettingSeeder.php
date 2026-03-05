<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'hero_title' => 'HACKATHON RUMAH PENDIDIKAN 2026',
                'hero_subtitle' => 'Wujudkan Indonesia Cerdas',
                'hero_tagline' => 'Gim Edukasi untuk Pembelajaran Seru',
                'primary_button_text' => 'Registrasi',
                'primary_button_url' => '/registrasi',
                'youtube_url' => 'https://www.youtube.com/',
                'home_description' => 'Hackathon Rumah Pendidikan adalah wadah untuk menciptakan ide, solusi, dan prototype teknologi pendidikan.',
                'hero_image' => 'image/hero/hero.jpg',
            ]
        );
    }
}