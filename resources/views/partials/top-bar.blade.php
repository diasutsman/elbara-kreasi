<!-- Top Bar -->
<div class="bg-primary text-onPrimary dark:text-onPrimaryDark text-sm p-4 font-bold">
    <div class="container flex justify-between sm:items-center h-full gap-x-4 items-start">
        <div class="flex gap-x-5 gap-y-4 flex-wrap justify-start">
            <p><a href="https://facebook.com" target="_SEJ" rel="noreferrer"><i class="bi bi-facebook"></i> Facebook</a></p>
            <p><a href="https://facebook.com" target="_SEJ" rel="noreferrer"><i class="bi bi-instagram"></i> Instagram</a></p>
        </div>
        <div class="flex uppercase gap-x-10 gap-y-4 flex-wrap justify-end items-center">
            <div>
                <a href="https://www.google.com/maps/search/Jl.+Raya+Keadilan+No.39+RT.4%2FRW.8,+Rangkapan+Jaya+Baru+Kec.+Pancoran+Mas+Kota+Depok,+Jawa+Barat+16434/@-6.406051,106.787581,15z?hl=en" target="_SEJ" rel="noreferrer">ALAMAT</a>
            </div>
            <div class="relative inline-flex items-center" x-data="{ show: false }">
                <button id="contact-btn" aria-expanded="false" class="flex gap-x-1" @click="show = !show">
                    <span>HUBUNGI KAMI</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-down transition-transform origin-center" :class="show && 'rotate-180'"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>
                <div id="menu-dropdown" x-cloak x-show="show" @click.away="show = false"
                    x-transition:enter="transition ease-in duration-75" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-out duration-100"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="z-30 absolute right-0 top-10 w-max origin-top-right rounded-md bg-white shadow-lg dark:bg-black ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1 divide-y-[1px] divide-primary" role="none">
                        <a class="p-3 block hover:bg-gray-50 dark:hover:bg-gray-900" href="tel:{{ phone($phoneNumbers, 'ID', 1) }}">
                            <p>Telepon</p>
                            <div class="mt-2">
                                <p><i class="bi bi-telephone-fill"></i> {{ phone($phoneNumbers, 'ID', 2) }}</p>
                            </div>
                        </a>
                        <a class="p-3 block hover:bg-gray-50 dark:hover:bg-gray-900"
                            href="https://api.whatsapp.com/send?phone={{ phone($whatsappNumbers, 'ID', 1) }}&text=Halo,%20Saya%20mau%20order"
                            target="_SEJ" rel="noreferrer">
                            <p>Whatsapp</p>
                            <div class="mt-2">
                                <p><i class="bi bi-whatsapp"></i> {{ phone($whatsappNumbers, 'ID', 2) }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex gap-x-2 items-center">
                <i class="bi bi-brightness-high-fill"></i>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input id="dark-mode-toggle" type="checkbox" class="sr-only peer" x-on:change="toggleDark" :checked="dark">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                </label>
                <i class="bi bi-moon-fill"></i>
            </div>
        </div>

    </div>
</div>
