<!-- Nav Bar -->
<nav
    class="sticky top-0 z-10 w-full bg-white px-4 font-bold dark:bg-dark-mode dark:text-linkDarkMode sm:flex sm:justify-center sm:p-0">
    <div class="relative mx-auto flex w-auto flex-wrap justify-between sm:justify-center" x-data="{ menuOpen: false }">
        <button class="relative block py-3 sm:hidden" id="hamburger" name="hamburger" type="button"
            :class="menuOpen && 'hamburger-active'" @click="menuOpen = !menuOpen">
            <span class="hamburger-line origin-top-left"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line origin-bottom-left"></span>
        </button>
        <div class="order-3 w-full overflow-hidden text-sm transition-[max-height] duration-500 ease-in-out sm:order-none sm:block sm:max-h-max sm:w-auto sm:text-xs"
            id="nav-menu" :class="menuOpen ? 'max-h-40' : 'max-h-0'">
            <ul
                class="flex h-full flex-col items-start justify-center py-4 uppercase sm:flex-row sm:items-center sm:py-0">
                <li class="w-full transition-colors duration-300 hover:bg-gray-200 dark:hover:bg-gray-900 sm:w-auto">
                    <a class="block p-2 sm:p-4 sm:px-6" href="/">
                        Home
                    </a>
                </li>
                <li class="w-full transition-colors duration-300 hover:bg-gray-200 dark:hover:bg-gray-900 sm:w-auto">
                    <a class="block p-2 sm:p-4 sm:px-6" href="{{ route('about') }}">
                        Tentang kami
                    </a>
                </li>
                <li class="w-full transition-colors duration-300 hover:bg-gray-200 dark:hover:bg-gray-900 sm:w-auto">
                    <a class="block p-2 sm:p-4 sm:px-6" href="{{ route('products.index') }}">
                        Produk kami
                    </a>
                </li>
                <li class="w-full transition-colors duration-300 hover:bg-gray-200 dark:hover:bg-gray-900 sm:w-auto">
                    <a class="block p-2 sm:p-4 sm:px-6" href="{{ route('order') }}">
                        cara order
                    </a>
                </li>
            </ul>
        </div>
        <div class="search-trigger grid place-content-center transition-colors duration-300 sm:hover:bg-gray-200 sm:dark:hover:bg-gray-900"
            x-data="{ searchOpen: false }">
            <button class="z-30 grid h-full place-content-center px-0 sm:px-4 place-self-stretch" id="search-btn"
                @click="menuOpen = menuOpen && false;searchOpen = !searchOpen;searchOpen && $refs.search.focus()">
                <i class="bi bi-search col-span-full row-span-full transition-opacity duration-500"
                    :class="searchOpen && 'opacity-0'"></i>
                <i class="bi bi-x-lg col-span-full row-span-full transition-opacity duration-500"
                    :class="!searchOpen && 'opacity-0'" x-cloak>
                </i>
            </button>
            <form class="absolute top-0 left-0 -z-10 m-0 h-full w-full opacity-0 transition-opacity duration-500"
                id="search-form" action="#" method="GET" :class="searchOpen && 'z-20 opacity-100'">
                <input class="h-full w-full border-none py-0 text-xl outline-none dark:bg-dark-mode" id="search"
                    type="text" name="search" placeholder="Cari produk" x-ref="search" />
            </form>
        </div>
    </div>
</nav>
