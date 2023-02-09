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
    <div class="bg-primary h-11 text-onPrimary text-sm px-4">
        <div class="container flex justify-between items-center h-full ">
            <div class="flex gap-5">
                <p><a href="https://facebook.com"><i class='bx bxl-facebook'></i> Facebook</a></p>
                <p><a href="https://facebook.com"><i class='bx bxl-instagram-alt'></i> Instagram</a></p>
            </div>
            <div class="flex uppercase gap-10">
                <p>ALAMAT</p>
                <div class="relative inline-block">
                    <button id="contact-btn" aria-expanded="false">HUBUNGI<i
                            class='bx bxs-chevron-down transition-transform origin-center'></i>
                    </button>
                    @include('components.dropdown')
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="w-full bg-[#EEEEEE] py-4 h-24 px-4">
        <div class="flex container  h-full flex-wrap lg:justify-between justify-center">
            <a href="/" class="h-full block">
                <img src="{{ asset('/img/logo.webp') }}" alt="Elbara Kreasi Logo" class="h-full" />
            </a>
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
    <nav class="w-full p-4 md:flex md:justify-center sticky top-0 bg-white">
        <div class="flex md:justify-center justify-between flex-wrap mx-auto w-auto relative">
            <button id="hamburger" name="hamburger" type="button" class="block md:hidden relative">
                <span class="hamburger-line origin-top-left"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line origin-bottom-left"></span>
            </button>
            <div id="nav-menu"
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
            </div>
            <div class="search-trigger grid place-content-center">
                <a href="#" class="md:px-4 px-0 grid place-content-center z-10" id="search-btn">
                    <box-icon name='search'
                        class="col-span-full row-span-full
                transition-opacity duration-500"></box-icon>
                    <box-icon name='x'
                        class="col-span-full row-span-full
                transition-opacity duration-500 opacity-0">
                    </box-icon>
                </a>
                <form action="#" method="GET"
                    class="absolute w-full h-full m-0 top-0 left-0 -z-10 opacity-0 transition-opacity duration-500"
                    id="search-form">
                    <input type="text" name="search" id="search" placeholder="Cari produk"
                        class="w-full h-full py-0 outline-none border-none
                     text-xl" />
                </form>
            </div>
        </div>
    </nav>

    @yield('content')

    @vite('resources/js/app.js')
</body>

</html>
