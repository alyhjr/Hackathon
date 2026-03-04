<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Poppins:wght@700;900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased" style="font-family: 'Plus Jakarta Sans', sans-serif;">

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
             style="background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 50%, #e0f2fe 100%);">

            {{-- Logo --}}
            <div class="mb-6">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2">
                    <img
                        src="{{ asset('image/header/kemendikdasmen.png') }}"
                        alt="Kemendikdasmen"
                        class="h-14 w-auto object-contain"
                    />
                </a>
            </div>

            {{-- Card --}}
            <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-xl overflow-hidden rounded-2xl border border-sky-100">
                {{ $slot }}
            </div>

            {{-- Footer --}}
            <p class="mt-6 text-xs text-slate-500">
                &copy; {{ date('Y') }} Kemendikdasmen · Hackathon Rumah Pendidikan
            </p>

        </div>
    </body>
</html>