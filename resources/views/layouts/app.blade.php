<!DOCTYPE html>
<html class="font-sans" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    @yield('styles')

    {{-- Fonts custom --}}
    <link rel="stylesheet" href="/css/fonts.css">

    <title>Elbara Kreasi Indonesia</title>
    @livewireStyles
</head>

<body class="overflow-x-hidden dark:bg-dark-mode">
    @include('partials.top-bar')
    @include('partials.header')
    @include('partials.nav')

    @yield('content')

    @include('partials.footer')

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/js/app.js')
    @yield('scripts')

</body>

</html>
