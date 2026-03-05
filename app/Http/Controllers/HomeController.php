<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        // ambil data CMS dari database
        $setting = SiteSetting::first();

        // kirim data ke view home
        return view('pages.home', compact('setting'));
    }
}