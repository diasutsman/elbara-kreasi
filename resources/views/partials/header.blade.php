<!-- Header -->
<header class="w-full bg-[#EEEEEE] dark:bg-[#1E1E1E] py-3 h-min px-4 font-bold">
    <div class="flex container h-full flex-wrap justify-between">
        <a href="/" class="flex items-center">
            <img src="{{ asset('/img/logo.webp') }}" alt="Elbara Kreasi Logo" class="h-16 dark:invert" />
        </a>
        <ul class="flex items-center justify-end text-dark dark:text-linkDarkMode lg:divide-x-[0.5px]">
            <li class="px-3 hidden lg:block">
                <p class="uppercase text-black dark:text-white text-xs">Telepon kami</p>
                <p class="text-base"><a href="tel:{{ phone($phoneNumbers, 'ID', 1) }}">{{ phone($phoneNumbers, 'ID', 2) }}</a></p>
            </li>
            <li class="px-3 hidden lg:block">
                <p class="uppercase text-black dark:text-white text-xs">Whatsapp Kami</p>
                <a class="text-base"
                    href="https://api.whatsapp.com/send?phone={{ phone($whatsappNumbers, 'ID', 1) }}&text=Halo,%20Saya%20mau%20order" target="_SEJ" rel="noreferrer">{{ phone($whatsappNumbers, 'ID', 2) }}</a>
            </li>
            <li class="px-3 hidden lg:block">
                <p class="uppercase text-black dark:text-white text-xs">email kami</p>
                <a class="text-base" href="mailto:{{ $emailReceiver }}">{{ $emailReceiver }}</a>
            </li>
            @auth
                <li class="lg:px-3" x-data="{ show: false }">
                    <div class="relative flex items-center justify-center">
                        <button class="flex items-center gap-x-2 cursor-pointer" @click="show = !show">
                            <p>{{ auth()->user()->username }}</p>
                            <div class="h-12 w-12 bg-placeholder rounded-full">
                                <img src="{{ asset('img/user-placeholder.webp') }}"
                                    alt="{{ auth()->user()->username }} Image">
                            </div>
                        </button>

                        <div class="absolute top-14 z-20 left-0 right-0 flex flex-col gap-2" x-cloak x-show="show"
                            x-transition @click.outside="show = false">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button
                                    class="font-bold text-center p-3 z-20 border-dark border-2 bg-white hover:bg-red-500 hover:text-white transition-colors w-full">Logout</button>
                            </form>

                            @can('admin')
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block text-center font-bold p-3 z-20 border-dark border-2 bg-white hover:bg-red-500 hover:text-white transition-colors w-full">Dashboard</a>
                            @endcan
                        </div>
                    </div>
                </li>
            @else
                <li class="lg:px-3 flex flex-col gap-y-1 text-center">
                    <a href="{{ route('login') }}"
                        class="text-white px-16 py-3 bg-secondary rounded-md hover:opacity-90 transition-opacity">Login</a>
                    <a href="{{ route('register') }}"
                        class="text-white px-16 py-3 bg-primary rounded-md hover:opacity-90 transition-opacity">Register</a>
                </li>
            @endauth
        </ul>
    </div>
</header>
