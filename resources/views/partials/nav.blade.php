<!-- Nav Bar -->
<nav
    class="sticky top-0 z-10 w-full bg-white font-bold dark:bg-dark-mode dark:text-linkDarkMode sm:flex sm:justify-center sm:p-0">
    <div class="relative mx-auto flex w-auto flex-wrap justify-between transition-colors sm:justify-center"
        x-data="{ menuOpen: false }" :class="menuOpen && 'max-sm:bg-[#F6F6F6]'">
        <button class="relative p-4 sm:hidden" id="hamburger" name="hamburger" type="button"
            :class="menuOpen && 'hamburger-active'" @click="menuOpen = !menuOpen">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.624984 4.33333H19.375C19.72 4.33333 19.9999 4.03464 19.9999 3.66667C19.9999 3.29864 19.7199 3 19.375 3H0.624984C0.280022 3 0 3.29864 0 3.66667C0 4.03469 0.280022 4.33333 0.624984 4.33333Z"
                    fill="black" />
                <path
                    d="M19.375 9.25H0.624984C0.27997 9.25 0 9.5487 0 9.91667C0 10.2846 0.280022 10.5833 0.624984 10.5833H19.375C19.72 10.5833 19.9999 10.2846 19.9999 9.91667C19.9999 9.5487 19.72 9.25 19.375 9.25Z"
                    fill="black" />
                <path
                    d="M19.375 15.5H0.624984C0.27997 15.5 0 15.7987 0 16.1667C0 16.5347 0.280022 16.8333 0.624984 16.8333H19.375C19.72 16.8333 19.9999 16.5346 19.9999 16.1667C20 15.7986 19.72 15.5 19.375 15.5Z"
                    fill="black" />
            </svg>
        </button>
        <div class="order-3 w-full overflow-hidden transition-[max-height] duration-500 ease-in-out sm:order-none sm:block sm:max-h-max sm:w-auto"
            id="nav-menu" :class="menuOpen ? 'max-h-[500px]' : 'max-h-0'">
            <div class="px-11 pb-7 pt-5 font-bold sm:p-0">
                <ul
                    class="flex h-full flex-col items-start justify-center gap-y-4 capitalize sm:flex-row sm:items-center sm:py-0 sm:text-xs sm:uppercase">
                    <li class="w-full transition-colors duration-300 sm:w-auto">
                        <a class="block border-b border-solid border-b-[#E2E2E2] py-1 transition-colors hover:bg-gray-200 sm:border-none sm:p-4 sm:px-6"
                            href="/">
                            Home
                        </a>
                    </li>
                    <li class="w-full transition-colors duration-300 sm:w-auto">
                        <a class="block border-b border-solid border-b-[#E2E2E2] py-1 transition-colors hover:bg-gray-200 sm:border-none sm:p-4 sm:px-6"
                            href="{{ route('about') }}">
                            Tentang kami
                        </a>
                    </li>
                    <li class="w-full transition-colors duration-300 sm:w-auto">
                        <a class="block border-b border-solid border-b-[#E2E2E2] py-1 transition-colors hover:bg-gray-200 sm:border-none sm:p-4 sm:px-6"
                            href="{{ route('products.index') }}">
                            Produk kami
                        </a>
                    </li>
                    <li class="w-full transition-colors duration-300 sm:w-auto">
                        <a class="block border-b border-solid border-b-[#E2E2E2] py-1 transition-colors hover:bg-gray-200 sm:border-none sm:p-4 sm:px-6"
                            href="{{ route('order') }}">
                            cara order
                        </a>
                    </li>
                </ul>
                <div class="mt-6 flex flex-col gap-y-3 sm:hidden">
                    <a class="block rounded-md bg-secondary px-3 py-2 text-white transition-opacity hover:opacity-90"
                        href="{{ route('login') }}">Login</a>
                    <a class="block rounded-md bg-primary px-3 py-2 text-white transition-opacity hover:opacity-90"
                        href="{{ route('register') }}">Register</a>
                </div>
            </div>
        </div>
        <button
            class="search-trigger grid place-content-center px-4 transition-colors duration-300 sm:px-0 sm:hover:bg-gray-200 sm:dark:hover:bg-gray-900"
            x-data="{ searchOpen: false }" :class="menuOpen && 'max-sm:pointer-events-none'"
            @click="searchOpen = !searchOpen;searchOpen && $refs.search.focus()">
            <div class="z-30 grid h-full place-content-center place-self-stretch px-0 transition-opacity sm:px-4"
                id="search-btn" :class="menuOpen && 'max-sm:opacity-0'">
                <i class="bi bi-search col-span-full row-span-full transition-opacity duration-500"
                    :class="searchOpen && 'opacity-0'"></i>
                <i class="bi bi-x-lg col-span-full row-span-full transition-opacity duration-500"
                    :class="!searchOpen && 'opacity-0'" x-cloak>
                </i>
            </div>
            <form class="absolute left-0 top-0 -z-10 m-0 h-full w-full opacity-0 transition-opacity duration-500"
                id="search-form" action="#" method="GET" :class="searchOpen && 'z-20 opacity-100'">
                <input
                    class="h-full w-full border-none px-4 py-0 text-xl outline-none dark:bg-dark-mode max-sm:bg-[#F6F6F6]"
                    id="search" type="text" name="search" placeholder="Cari produk..." x-ref="search"
                    @click="event.stopPropagation()" />
            </form>
        </button>
    </div>
</nav>
