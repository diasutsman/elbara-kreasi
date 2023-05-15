<!DOCTYPE html>
<html class="font-sans" lang="en"
    x-data='{ dark: localStorage.theme === "dark", 
    toggleDark() {
        $el.classList.toggle("dark");
        localStorage.theme = (this.dark = !this.dark) ? "dark" : "light";
    } }'
    :class="dark && 'dark'" x-ref="html">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" x-bind:href="dark ? '{{ asset('favicon-dark.ico') }}' : '{{ asset('favicon.ico') }}'"
        type="image/x-icon" />

    @vite('resources/css/app.css')

    <script>
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    @yield('styles')

    {{-- Fonts custom --}}
    <link rel="stylesheet" href="/css/fonts.css">

    <title>Elbara Kreasi Indonesia</title>
    @livewireStyles
</head>

<body class="dark:bg-dark-mode overflow-x-hidden">
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
