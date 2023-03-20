<!DOCTYPE html>
<html lang="en" class="font-sans">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <title>Elbara Kreasi Indonesia</title>
</head>

<body class="h-[100dvh] h-screen">
    <div class="flex p-5 items-stretch h-full gap-16">
        <div class="hidden md:grid bg-placeholder flex-1 rounded-lg px-10 py-12">
            <img src="{{ asset('img/logo.webp') }}" alt="Elbara Kreasi Logo" class="h-12 row-span-full col-span-full">
            <h1 class="text-white font-bold text-4xl self-center row-span-full col-span-full">Custom Packaging Untuk Produk Anda</h1>
        </div>

        <div class="flex-[1.5]">
            @yield('content')
        </div>
    </div>
</body>

</html>
