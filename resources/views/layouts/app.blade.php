<!DOCTYPE html>
<html lang="en" class="font-sans">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link href="{{ asset('favicon-dark.ico') }}" id="darkUrl" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    {{-- Fonts custom --}}
    <link rel="stylesheet" href="/css/fonts.css">

    <title>Elbara Kreasi Indonesia</title>
</head>

<body class="dark:bg-dark-mode">
    @include('partials.top-bar')
    @include('partials.header')
    @include('partials.nav')

    @yield('content')

    @include('partials.footer')
    @vite('resources/js/app.js')
</body>

</html>
