<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Hackathon')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-900">

  @include('partials.navbar')

  <main>
    @yield('content')
  </main>

  @include('partials.footer')

</body>
</html>