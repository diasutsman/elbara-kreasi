<!-- Nav Bar -->
<nav
    class="w-full px-4 sm:p-0 sm:flex sm:justify-center sticky top-0 bg-white dark:bg-dark-mode dark:text-linkDarkMode z-10 font-bold">
    <div class="flex sm:justify-center justify-between flex-wrap mx-auto w-auto relative" x-data="{ menuOpen: false }">
        <button id="hamburger" name="hamburger" type="button" class="block sm:hidden relative py-3"
            :class="menuOpen && 'hamburger-active'" @click="menuOpen = !menuOpen">
            <span class="hamburger-line origin-top-left"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line origin-bottom-left"></span>
        </button>
        <div id="nav-menu"
            class="order-3 w-full sm:max-h-max overflow-hidden sm:block sm:w-auto sm:order-none text-sm sm:text-xs transition-[max-height] duration-500 ease-in-out"
            :class="menuOpen ? 'max-h-40' : 'max-h-0'">
            <ul
                class="uppercase flex flex-col sm:flex-row sm:items-center items-start justify-center h-full py-4 sm:py-0">
                <li class="w-full sm:w-auto hover:bg-gray-200 dark:hover:bg-gray-900 transition-colors duration-300">
                    <a href="/" class="sm:p-4 sm:px-6 block p-2">
                        Home
                    </a>
                </li>
                <li class="w-full sm:w-auto hover:bg-gray-200 dark:hover:bg-gray-900 transition-colors duration-300">
                    <a href="#" class="sm:p-4 sm:px-6 block p-2">
                        Tentang kami
                    </a>
                </li>
                <li class="w-full sm:w-auto hover:bg-gray-200 dark:hover:bg-gray-900 transition-colors duration-300">
                    <a href="{{ route('products.index') }}" class="sm:p-4 sm:px-6 block p-2">
                        Produk kami
                    </a>
                </li>
                <li class="w-full sm:w-auto hover:bg-gray-200 dark:hover:bg-gray-900 transition-colors duration-300">
                    <a href="#" class="sm:p-4 sm:px-6 block p-2">
                        cara order
                    </a>
                </li>
            </ul>
        </div>
        <div class="search-trigger grid place-content-center sm:hover:bg-gray-200 sm:dark:hover:bg-gray-900 transition-colors duration-300"
            x-data="{ searchOpen: false }">
            <button class="sm:px-4 px-0 grid place-content-center z-20" id="search-btn"
                @click="menuOpen = menuOpen && false;searchOpen = !searchOpen;searchOpen && $refs.search.focus()">
                <i class="bi bi-search col-span-full row-span-full transition-opacity duration-500"
                    :class="searchOpen && 'opacity-0'"></i>
                <i class="bi bi-x-lg col-span-full row-span-full transition-opacity duration-500"
                    :class="!searchOpen && 'opacity-0'" x-cloak>
                </i>
            </button>
            <form action="#" method="GET"
                class="absolute w-full h-full -z-10 m-0 top-0 left-0 opacity-0 transition-opacity duration-500"
                :class="searchOpen && 'z-10 opacity-100'" id="search-form">
                <input type="text" name="search" id="search" placeholder="Cari produk"
                    class="w-full h-full py-0 outline-none border-none text-xl dark:bg-dark-mode" x-ref="search" />
            </form>
        </div>
    </div>
</nav>
