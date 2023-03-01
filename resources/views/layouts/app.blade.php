<!DOCTYPE html>
<html lang="en" class="font-sans">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('favicon-dark.ico') }}" type="image/x-icon"
        media="(prefers-color-scheme: dark)" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    {{-- Fonts custom --}}
    <link rel="stylesheet" href="/css/fonts.css">

    <title>Elbara Kreasi Indonesia</title>
</head>

<body class="dark:bg-dark-mode">
    <!-- Top Bar -->
    <div class="bg-primary text-onPrimary dark:text-onPrimaryDark text-sm p-4">
        <div class="container flex justify-between items-center h-full gap-x-4">
            <div class="flex gap-x-5 gap-y-4 flex-wrap justify-start">
                <p><a href="https://facebook.com"><i class="bi bi-facebook"></i> Facebook</a></p>
                <p><a href="https://facebook.com"><i class="bi bi-instagram"></i> Instagram</a></p>
            </div>
            <div class="flex uppercase gap-x-10 gap-y-4 flex-wrap justify-end">
                <p>ALAMAT</p>
                <div class="relative inline-block">
                    <button id="contact-btn" aria-expanded="false" class="flex gap-x-1">
                        <span>HUBUNGI KAMI</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-down transition-transform origin-center" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                    <div id="menu-dropdown"
                        class="transition ease-out duration-100 transform opacity-0 scale-95 -z-10
                              absolute right-0 top-10 w-max origin-top-right rounded-md bg-white
                              shadow-lg dark:bg-black ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1 divide-y-[1px] divide-primary" role="none">
                            <a class="p-3 block hover:bg-gray-50 dark:hover:bg-gray-900" href="tel:6281234567890"
                                target="_blank">
                                <p>Telepon</p>
                                <div class="mt-2">
                                    <p><i class="bi bi-telephone-fill"></i> 0812-3456-7890</p>
                                </div>
                            </a>
                            <a class="p-3 block hover:bg-gray-50 dark:hover:bg-gray-900"
                                href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo,%20Saya%20mau%20order"
                                target="_blank">
                                <p>Whatsapp</p>
                                <div class="mt-2">
                                    <p><i class="bi bi-whatsapp"></i> 0812-3456-7890</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input id="dark-mode-toggle" type="checkbox" class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>

        </div>
    </div>

    <!-- Header -->
    <header class="w-full bg-[#EEEEEE] dark:bg-[#1E1E1E] py-4 h-24 px-4">
        <div class="flex container h-full flex-wrap lg:justify-between justify-center">
            <a href="/" class="h-full block">
                <img src="{{ asset('/img/logo.webp') }}" alt="Elbara Kreasi Logo" class="h-full dark:invert" />
            </a>
            <ul class="hidden lg:flex items-center justify-end text-dark dark:text-linkDarkMode divide-x-[0.5px]">
                <li class="px-3">
                    <p class="uppercase text-black dark:text-white text-xs">Telepon kami</p>
                    <p class="text-base"><a href="tel:081234567890">0812-3456-7890</a></p>
                </li>
                <li class="px-3">
                    <p class="uppercase text-black dark:text-white text-xs">Whatsapp Kami</p>
                    <a class="text-base"
                        href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo,%20Saya%20mau%20order">0812-3456-7890</a>
                </li>
                <li class="px-3">
                    <p class="uppercase text-black dark:text-white text-xs">email kami</p>
                    <a class="text-base" href="mailto:elbarakreasi@gmail.com">elbarakreasi@gmail.com</a>
                </li>
                <li class="px-3">
                    <p class="uppercase text-black dark:text-white text-xs">jam kerja</p>
                    <p class="text-base">Senin - Jumat 09:00 - 21:00</p>
                </li>
            </ul>
        </div>
    </header>

    <!-- Nav Bar -->
    <nav class="w-full p-4 md:flex md:justify-center sticky top-0 bg-white dark:bg-dark-mode dark:text-linkDarkMode">
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
                <button class="md:px-4 px-0 grid place-content-center z-10" id="search-btn">
                    <i
                        class="bi bi-search col-span-full row-span-full
              transition-opacity duration-500"></i>
                    <i
                        class="bi bi-x-lg col-span-full row-span-full
              transition-opacity duration-500 opacity-0">
                    </i>
                </button>
                <form action="#" method="GET"
                    class="absolute w-full h-full m-0 top-0 left-0 -z-10 opacity-0 transition-opacity duration-500"
                    id="search-form">
                    <input type="text" name="search" id="search" placeholder="Cari produk"
                        class="w-full h-full py-0 outline-none border-none
                   text-xl dark:bg-dark-mode" />
                </form>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="px-4 bg-primary text-onPrimary dark:text-onPrimaryDark pt-11 pb-6">
            <div class="container flex flex-wrap md:flex-nowrap justify-between gap-8 lg:gap-16">
                <div>
                    <img src="img/white-logo.webp" alt="White Elbara Kreasi Logo" class="w-52 md:w-full">
                </div>
                <div class="flex flex-col capitalize">
                    <a href="#" class="w-max">Home</a>
                    <a href="#" class="w-max">Tentang Kami</a>
                    <a href="#" class="w-max">Produk Kami</a>
                    <a href="#" class="w-max">Portfolio & klien</a>
                </div>
                <div class="flex gap-5 flex-wrap md:flex-nowrap">
                    <div>
                        <p>Main Office</p>
                        <p class="text-white dark:text-dark-mode-text inline">
                            Jl. Raya Keadilan No.39, Rangkapan Jaya Baru, Kec. Pancoran Mas, Kota Depok, Jawa Barat
                            16434
                        </p>
                    </div>
                    <iframe class="m-0 p-0" title="Elbara Kreasi Map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9064612735992!2d106.7853925144214!3d-6.406050695364924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e916907ea677%3A0x539fe5a1e4c64903!2sJl.%20Raya%20Keadilan%20No.39%2C%20RT.4%2FRW.8%2C%20Rangkapan%20Jaya%20Baru%2C%20Kec.%20Pancoran%20Mas%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016434!5e0!3m2!1sen!2sid!4v1676000016127!5m2!1sen!2sid"
                        width="150" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div>
                    <p class="text-base">Telepon Kami :</p>
                    <a href="tel:6281234567890"
                        class="text-xl text-white dark:text-dark-mode-text mt-1">0812-3456-7890</a>
                    <p class="text-base mt-2">Whatsapp Kami :</p>
                    <a href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo,%20Saya%20mau%20order"
                        class="text-xl text-white dark:text-dark-mode-text mt-1">0812-3456-7890</a>
                    <p class="text-base mt-2">Email Kami :</p>
                    <a href="mailto:elbarakreasi@gmail.com"
                        class="text-xl text-white dark:text-dark-mode-text mt-1">elbarakreasi@gmail.com</a>
                    <div class="mt-4 gap-x-4 flex">
                        <a href="https://facebook.com" class="text-2xl">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://instagram.com" class="text-2xl">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-onPrimaryDark text-primary p-3">
            <div class="container">
                <p class="text-xs">©{{ date('Y') }} Elbara Kreasi Indonesia</p>
            </div>
        </div>
    </footer>
    @vite('resources/js/app.js')
</body>

</html>
