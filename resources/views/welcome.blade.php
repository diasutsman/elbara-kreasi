<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('favicon-dark.ico') }}" type="image/x-icon"
        media="(prefers-color-scheme: dark)" />

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    {{-- Fonts custom --}}
    <link rel="stylesheet" href="/css/fonts.css">

    <title>Elbara Kreasi Indonesia</title>
</head>

<body class="font-sans">
    <!-- Top Bar -->
    <div class="w-full bg-[#D9D9D9] h-11"></div>

    <!-- Header -->
    <header class="w-full bg-[#EEEEEE] py-4 h-24 px-4">
        <div class="flex max-w-6xl mx-auto h-full flex-wrap lg:justify-between justify-center">
            <img src="{{ asset('/img/logo.webp') }}" alt="Elbara Kreasi Logo" class="h-full" />
            <ul class="hidden lg:flex items-center justify-end text-dark divide-x-[0.5px]">
                <li class="px-3">
                    <p class="uppercase text-[#000] text-xs">Telepon kami</p>
                    <p class="text-base">0812-3456-7890</p>
                </li>
                <li class="px-3">
                    <p class="uppercase text-[#000] text-xs">Whatsapp Kami</p>
                    <p class="text-base">0812-3456-7890</p>
                </li>
                <li class="px-3">
                    <p class="uppercase text-[#000] text-xs">email kami</p>
                    <p class="text-base">elbarakreasi@gmail.com</p>
                </li>
                <li class="px-3">
                    <p class="uppercase text-[#000] text-xs">jam kerja</p>
                    <p class="text-base">Senin - Jumat 09:00 - 21:00</p>
                </li>
            </ul>
        </div>
    </header>

    <!-- Nav Bar -->
    <div class="w-full p-4">
        <div class="flex md:justify-center justify-between flex-wrap">
            <button id="hamburger" name="hamburger" type="button" class="block md:hidden relative">
                <span class="hamburger-line origin-top-left"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line origin-bottom-left"></span>
            </button>
            <nav id="nav-menu"
                class="order-3 w-full max-h-0 md:max-h-max overflow-hidden md:block md:w-auto md:order-none
             text-sm md:text-xs transition-[max-height] duration-500 ease-in-out">
                <ul
                    class="uppercase flex flex-col md:flex-row md:items-center items-start
            justify-center gap-4 h-full py-4 md:py-0">
                    <li><a href="#" class="md:px-4">Home</a></li>
                    <li><a href="#" class="md:px-4">Tentang kami</a></li>
                    <li><a href="#" class="md:px-4">Produk kami</a></li>
                    <li><a href="#" class="md:px-4">cara order</a></li>
                </ul>
            </nav>
            <a href="#" class="px-4"><i class="bx bx-search h-5 w-5"></i></a>
        </div>
    </div>

    <!-- Hero -->
    <div class="px-4">
        <div class="flex max-w-6xl mx-auto mt-16 flex-wrap gap-y-8">
            <div class="md:flex-1">
                <div class="mr-40 flex flex-col justify-center items-start h-full gap-4">
                    <h1 class="text-4xl">
                        Custom Cosmetic <br />
                        Packaging Solutions
                    </h1>
                    <p class="text-base">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis,
                        beatae incidunt quos officia nemo distinctio soluta. Voluptas sint
                        fugiat inventore?
                    </p>
                    <a href="#" class="uppercase text-sm p-3 text-white bg-primary rounded-full mt-4">custom
                        sekarang!</a>
                </div>
            </div>
            <div class="md:flex-1 w-full">
                <div class="h-80 bg-[#CCCCCC] rounded-[67px]"></div>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
