<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Faq;
use App\Models\Timeline;
use App\Models\InformasiPenting;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $setting = SiteSetting::first();

        $faqs = Faq::where('is_active', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->take(6);

        $timeline = Timeline::where('is_active', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $informasiPentingItems = InformasiPenting::where('is_active', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

          
        $newsItems = News::where('is_active', true)
    ->orderByDesc('is_featured')
    ->orderBy('sort_order')
    ->orderByDesc('published_at')
    ->get();

        return view('pages.home', compact('setting', 'faqs', 'timeline', 'informasiPentingItems', 'newsItems'));
    }
}