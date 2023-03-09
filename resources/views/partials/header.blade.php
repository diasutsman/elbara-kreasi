<!-- Header -->
<header class="w-full bg-[#EEEEEE] dark:bg-[#1E1E1E] py-3 h-min px-4 font-bold">
    <div class="flex container h-full flex-wrap lg:justify-between justify-center">
        <a href="/" class="flex items-center">
            <img src="{{ asset('/img/logo.webp') }}" alt="Elbara Kreasi Logo" class="h-16 dark:invert" />
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
            @auth
                <li class="px-3 flex items-center gap-x-2">
                    <p>{{ auth()->user()->name }}</p>
                    <div class="h-12 w-12 bg-placeholder rounded-full">
                        <img src="{{ asset('img/user-placeholder.webp') }}" alt="{{ auth()->user()->name }} Image">
                    </div>
                </li>
            @else
                <li class="px-3 flex flex-col gap-y-1 text-center">
                    <a href="{{ route('login') }}"
                        class="text-white px-16 py-3 bg-secondary rounded-md hover:opacity-90 transition-opacity">Login</a>
                    <a href="{{ route('register') }}"
                        class="text-white px-16 py-3 bg-primary rounded-md hover:opacity-90 transition-opacity">Register</a>
                </li>
            @endauth
        </ul>
    </div>
</header>
