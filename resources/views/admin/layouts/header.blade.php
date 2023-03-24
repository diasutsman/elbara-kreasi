<header>
    <!--Nav-->
    <nav class="fixed top-0 z-20 mt-0 h-auto w-full bg-gray-800 px-1 pt-2 pb-1 md:pt-1" aria-label="menu nav">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink justify-center text-white md:w-1/3 md:justify-start">
                <a href="/" aria-label="Home">
                    <span class="pl-2 text-xl">&LeftArrow; Home</span>
                </a>
            </div>

            <div class="flex flex-1 justify-center px-2 text-white md:w-1/3 md:justify-start">
                <span class="relative w-full">
                    <input
                        class="w-full appearance-none rounded border border-transparent bg-gray-900 py-3 px-2 pl-10 leading-normal text-white transition focus:border-gray-400 focus:outline-none"
                        id="search" aria-label="search" type="search" placeholder="Search">
                    <div class="search-icon absolute" style="top: 1rem; left: .8rem;">
                        <svg class="pointer-events-none h-4 w-4 fill-current text-white"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                            </path>
                        </svg>
                    </div>
                </span>
            </div>

            <div class="flex w-full content-center justify-between pt-2 md:w-1/3 md:justify-end">
                <ul class="list-reset flex flex-1 items-center justify-between md:flex-none">
                    <li class="flex flex-1 justify-end md:mr-3 md:flex-none">
                        <div class="relative inline-block" x-data="{ open: false }">
                            <button class="drop-button py-2 px-2 text-white" @click="open = !open"> <span
                                    class="pr-2"><i class="em em-robot_face"></i></span> Hi,
                                {{ auth()->user()->username }} <svg class="inline h-3 fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg></button>
                            <div class="dropdownlist absolute right-0 z-30 mt-3 overflow-auto bg-gray-800 p-3 text-white"
                                id="myDropdown" @click.away="open = false" x-show="open" x-cloak>
                                <div x-data="{
                                    search: '',
                                    show_item(el) {
                                        return this.search === '' || el.textContent.trim().toLowerCase().includes(this.search.toLowerCase())
                                    }
                                }">
                                    <input class="drop-search p-2 text-gray-600" id="myInput" type="text"
                                        placeholder="Search.." x-model="search">
                                    <a class="block p-2 text-sm text-white no-underline hover:bg-gray-800 hover:no-underline"
                                        href="#" x-show="show_item($el)"><i class="fa fa-user fa-fw"></i>
                                        Profile</a>
                                    <a class="block p-2 text-sm text-white no-underline hover:bg-gray-800 hover:no-underline"
                                        href="#" x-show="show_item($el)"><i class="fa fa-cog fa-fw"></i>
                                        Settings</a>
                                    <div class="border border-gray-800"></div>
                                    <form action="{{ route('logout') }}" method="POST" x-show="show_item($el)">
                                        @csrf
                                        <button
                                            class="block p-2 text-sm text-white no-underline hover:bg-gray-800 hover:no-underline"
                                            type="submit"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</header>
