<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Hackathon')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-slate-900 overflow-x-hidden antialiased">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- MAIN CONTAINER (UKURAN WEB UMUM) --}}
    <main class="mx-auto w-full max-w-6xl px-4 md:px-6">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>