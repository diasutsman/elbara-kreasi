<footer>
    <div class="bg-primary py-4 pb-6 font-bold text-onPrimary dark:text-onPrimaryDark xl:pt-11">
        <div
            class="container flex flex-wrap justify-between gap-8 sm:max-md:px-10 md:max-lg:px-8 lg:max-xl:px-16 xl:flex-nowrap xl:gap-10">
            <div class="flex w-full justify-between gap-x-16">
                <div class="grid content-center md:content-start">
                    <img class="w-36 md:w-56 xl:w-full" src="{{ asset('img/white-logo.webp') }}"
                        alt="White Elbara Kreasi Logo">
                </div>
                <div class="flex flex-col gap-y-4 capitalize md:gap-y-2 md:text-xl md:max-xl:text-end">
                    <a class="block min-w-max" href="/">Home</a>
                    <a class="block min-w-max" href="{{ route('about') }}">Tentang Kami</a>
                    <a class="block min-w-max" href="{{ route('products.index') }}">Produk Kami</a>
                    <a class="block min-w-max" href="{{ route('products.index') }}">Portfolio & klien</a>
                </div>
            </div>
            <div class="flex w-full justify-between gap-5 md:w-auto md:flex-col xl:flex-row xl:gap-8">
                <div class="flex w-[175px] flex-col items-start xl:w-auto xl:flex-1">
                    <p class="md:text-xl">Main Office</p>
                    <p class="mb-3 text-xs text-secondaryVariant dark:text-dark-mode-text md:text-base">Jl. Raya
                        Keadilan
                        No.39, Rangkapan
                        Jaya Baru,
                        Kec.
                        Pancoran Mas, Kota Depok, Jawa Barat 16434
                    </p>
                    <a class="block rounded-md bg-onPrimary px-6 py-2 text-xs font-bold text-white drop-shadow-[0px_1px_4px_rgba(0,0,0,0.15)] transition hover:opacity-90 hover:drop-shadow-none"
                        target="_SEJ" rel="noreferrer"
                        href="https://www.google.com/maps/search/Jl.+Raya+Keadilan+No.39+RT.4%2FRW.8,+Rangkapan+Jaya+Baru+Kec.+Pancoran+Mas+Kota+Depok,+Jawa+Barat+16434/@-6.406051,106.787581,15z?hl=en">Open
                        in Maps</a>
                </div>
                <div class="xl:flex-1">
                    <p class="font-bold">Pembayaran via</p>
                    <div class="mt-4 flex gap-4">
                        <div class="flex flex-col gap-4">
                            <img class="h-4 sm:h-5" src="{{ asset('img/bca.webp') }}" alt="Bank Central Asia">
                            <img class="h-4 sm:h-5" src="{{ asset('img/bri.webp') }}" alt="Bank Rakyat Indonesia">
                        </div>
                        <div class="flex flex-col gap-4">
                            <img class="h-4 sm:h-5" src="{{ asset('img/gopay.webp') }}" alt="Gopay">
                            <img class="h-4 sm:h-5" src="{{ asset('img/bsi.webp') }}" alt="Bank Syariah Indonesia">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex w-full justify-between md:w-auto md:flex-col md:justify-start md:gap-y-2">
                <div class="md:max-xl:text-end">
                    <p class="text-base">Telepon Kami :</p>
                    <a class="mt-1 text-xs text-secondaryVariant dark:text-dark-mode-text md:text-xl"
                        href="tel:{{ phone($phoneNumbers, 'ID', 1) }}">{{ phone($phoneNumbers, 'ID', 2) }}</a>
                    <p class="mt-2 text-base">Whatsapp Kami :</p>
                    <a class="mt-1 text-xs text-secondaryVariant dark:text-dark-mode-text md:text-xl"
                        href="https://api.whatsapp.com/send?phone={{ phone($whatsappNumbers, 'ID', 1) }}&text=Halo,%20Saya%20mau%20order"
                        target="_SEJ" rel="noreferrer">{{ phone($whatsappNumbers, 'ID', 2) }}</a>
                    <p class="mt-2 text-base">Email Kami :</p>
                    <a class="mt-1 text-xs text-secondaryVariant dark:text-dark-mode-text md:text-xl"
                        href="mailto:{{ $emailReceiver }}">{{ $emailReceiver }}</a>
                </div>
                <div class="flex items-start gap-x-8 sm:items-center md:gap-x-4 md:max-xl:justify-end">
                    <a class="text-2xl" href="https://facebook.com" target="_SEJ" rel="noreferrer">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a class="text-2xl" href="https://instagram.com" target="_SEJ" rel="noreferrer">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-onPrimaryDark py-4 text-primary">
        <div class="container">
            <p class="text-xs">©{{ date('Y') }} Elbara Kreasi Indonesia</p>
        </div>
    </div>
</footer>
