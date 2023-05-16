<!-- Header -->
<header class="h-min w-full bg-[#EEEEEE] py-2 font-bold dark:bg-[#1E1E1E]">
    <div class="container flex h-full justify-center sm:justify-between">
        <a class="flex items-center" href="/">
            <img class="h-16 dark:invert" src="{{ asset('/img/logo.webp') }}" alt="Elbara Kreasi Logo" />
        </a>
        <ul class="flex items-center justify-end text-dark dark:text-linkDarkMode lg:divide-x-[0.5px]">
            <li class="hidden px-3 lg:block">
                <p class="text-xs uppercase text-black dark:text-white">Telepon kami</p>
                <p class="text-base"><a
                        href="tel:{{ phone($phoneNumbers, 'ID', 1) }}">{{ phone($phoneNumbers, 'ID', 2) }}</a></p>
            </li>
            <li class="hidden px-3 lg:block">
                <p class="text-xs uppercase text-black dark:text-white">Whatsapp Kami</p>
                <a class="text-base"
                    href="https://api.whatsapp.com/send?phone={{ phone($whatsappNumbers, 'ID', 1) }}&text=Halo,%20Saya%20mau%20order"
                    target="_SEJ" rel="noreferrer">{{ phone($whatsappNumbers, 'ID', 2) }}</a>
            </li>
            <li class="hidden px-3 lg:block">
                <p class="text-xs uppercase text-black dark:text-white">email kami</p>
                <a class="text-base" href="mailto:{{ $emailReceiver }}">{{ $emailReceiver }}</a>
            </li>
            @auth
                <li class="lg:px-3 hidden sm:block" x-data="{ show: false }">
                    <div class="relative flex items-center justify-center">
                        <button class="flex cursor-pointer items-center gap-x-2" @click="show = !show">
                            <p>{{ auth()->user()->username }}</p>
                            <div class="h-12 w-12 rounded-full bg-placeholder">
                                <img src="{{ asset('img/user-placeholder.webp') }}"
                                    alt="{{ auth()->user()->username }} Image">
                            </div>
                        </button>

                        <div class="absolute left-0 right-0 top-14 z-20 flex flex-col gap-2" x-cloak x-show="show"
                            x-transition @click.outside="show = false">
                            @can('admin')
                                <a class="z-20 block w-full border-2 border-dark bg-white p-3 text-center font-bold transition-colors hover:bg-blue-500 hover:text-white"
                                    href="/admin">Dashboard</a>
                            @endcan

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button
                                    class="z-20 w-full border-2 border-dark bg-white p-3 text-center font-bold transition-colors hover:bg-red-500 hover:text-white">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            @else
                <li class="hidden flex-col gap-y-1 text-center sm:flex lg:pl-3">
                    <a class="rounded-md bg-secondary px-16 py-3 text-white transition-opacity hover:opacity-90"
                        href="{{ route('login') }}">Login</a>
                    <a class="rounded-md bg-primary px-16 py-3 text-white transition-opacity hover:opacity-90"
                        href="{{ route('register') }}">Register</a>
                </li>
            @endauth
        </ul>
    </div>
</header>
