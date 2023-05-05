<!DOCTYPE html>
<html class="font-sans" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <title>Elbara Kreasi Indonesia</title>
</head>

<body class="h-[100dvh] h-screen">
    <div class="flex h-full items-stretch gap-[4.8%] md:p-5">
        <div class="hidden flex-1 rounded-lg bg-placeholder px-10 py-12 md:grid">
            <img class="col-span-full row-span-full h-12" src="{{ asset('img/logo.webp') }}" alt="Elbara Kreasi Logo">
            <h1 class="col-span-full row-span-full self-center text-4xl font-bold text-white">Custom Packaging Untuk
                Produk Anda</h1>
        </div>

        <div class="z-10 grid flex-[1.5] md:items-center">
            <div class="h-auto md:bg-transparent">
                @yield('content')
            </div>
        </div>

        <img class="absolute bottom-11 left-1/2 -z-10 h-11 -translate-x-1/2 [@media(max-height:768px)]:hidden md:hidden"
            src="{{ asset('img/logo.webp') }}" alt="Logo Elbara Kreasi">

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
    </div>
</body>

</html>
