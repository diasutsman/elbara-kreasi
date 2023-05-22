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

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <title>Elbara Kreasi Indonesia</title>
    @livewireStyles
</head>

<body class="overflow-x-hidden dark:bg-dark-mode">
    @include('partials.top-bar')
    @include('partials.header')

    <section class="mt-36 mb-52 px-6 dark:text-white">

        <div class="container">
            <div class="flex flex-col items-center text-center gap-6">
                <img src="{{ asset('/img/maintenance.svg') }}" alt="">
                <h1 class="font-bold text-sm">Sorry...<br> we’re under maintenance</h1>
                <p class="text-xs">Sorry, the website is currently under<br> maintenance, please come back later</p>
            </div>
        </div>
    </section>

    @include('partials.footer')

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/js/app.js')
    @yield('scripts')

</body>

</html>
