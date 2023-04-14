<footer>
    <div class="bg-primary py-4 pb-6 font-bold text-onPrimary dark:text-onPrimaryDark xl:pt-11">
        <div
            class="container flex flex-wrap justify-between gap-8 sm:max-md:px-10 md:max-lg:px-8 xl:gap-16 lg:max-xl:px-16 xl:flex-nowrap">
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
            <div class="flex w-full justify-between gap-5 md:w-auto md:flex-col xl:flex-row">
                <div class="grid w-[175px] xl:w-auto content-center xl:content-start">
                    <p class="md:text-xl">Main Office</p>
                    <p class="text-secondaryVariant text-xs dark:text-dark-mode-text md:text-base">Jl. Raya Keadilan
                        No.39, Rangkapan
                        Jaya Baru,
                        Kec.
                        Pancoran Mas, Kota Depok, Jawa Barat 16434
                    </p>
                </div>
                <iframe class="m-0 h-32 w-32 p-0 sm:h-40 sm:w-40 md:h-40 md:w-40" title="Elbara Kreasi Map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9064612735992!2d106.7853925144214!3d-6.406050695364924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e916907ea677%3A0x539fe5a1e4c64903!2sJl.%20Raya%20Keadilan%20No.39%2C%20RT.4%2FRW.8%2C%20Rangkapan%20Jaya%20Baru%2C%20Kec.%20Pancoran%20Mas%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016434!5e0!3m2!1sen!2sid!4v1676000016127!5m2!1sen!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="flex w-full justify-between md:w-auto md:flex-col md:justify-start md:gap-y-2">
                <div class="md:max-xl:text-end">
                    <p class="text-base">Telepon Kami :</p>
                    <a class="text-secondaryVariant mt-1 text-xs dark:text-dark-mode-text md:text-xl"
                        href="tel:{{ phone($phoneNumbers, 'ID', 1) }}">{{ phone($phoneNumbers, 'ID', 2) }}</a>
                    <p class="mt-2 text-base">Whatsapp Kami :</p>
                    <a class="text-secondaryVariant mt-1 text-xs dark:text-dark-mode-text md:text-xl"
                        href="https://api.whatsapp.com/send?phone={{ phone($whatsappNumbers, 'ID', 1) }}&text=Halo,%20Saya%20mau%20order"
                        target="_SEJ" rel="noreferrer">{{ phone($whatsappNumbers, 'ID', 2) }}</a>
                    <p class="mt-2 text-base">Email Kami :</p>
                    <a class="text-secondaryVariant mt-1 text-xs dark:text-dark-mode-text md:text-xl"
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
