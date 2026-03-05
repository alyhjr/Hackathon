<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $setting = SiteSetting::first();

        // ambil hanya 6 FAQ untuk homepage
        $faqs = Faq::where('is_active', 1)
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

        return view('pages.home', compact('setting', 'faqs'));
    }
}