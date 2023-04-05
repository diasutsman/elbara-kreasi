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
    <div class="flex h-full items-stretch gap-16 p-5">
        <div class="hidden flex-1 rounded-lg bg-placeholder px-10 py-12 md:grid">
            <img class="col-span-full row-span-full h-12" src="{{ asset('img/logo.webp') }}" alt="Elbara Kreasi Logo">
            <h1 class="col-span-full row-span-full self-center text-4xl font-bold text-white">Custom Packaging Untuk
                Produk Anda</h1>
        </div>

        <div class="flex-[1.5]">
            @yield('content')
        </div>

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
    </div>
</body>

</html>
