<footer>
    <div class="bg-primary px-4 pt-11 pb-6 font-bold text-onPrimary dark:text-onPrimaryDark">
        <div class="container flex flex-wrap justify-between gap-8 lg:flex-nowrap lg:gap-16">
            <div>
                <img class="w-52 lg:w-full" src="{{ asset('img/white-logo.webp') }}" alt="White Elbara Kreasi Logo">
            </div>
            <div class="flex flex-col capitalize">
                <a class="w-max" href="/">Home</a>
                <a class="w-max" href="{{ route('about') }}">Tentang Kami</a>
                <a class="w-max" href="{{ route('products.index') }}">Produk Kami</a>
                <a class="w-max" href="{{ route('products.index') }}">Portfolio & klien</a>
            </div>
            <div class="flex flex-wrap gap-5 md:flex-nowrap">
                <div>
                    <p>Main Office</p>
                    <p class="text-white dark:text-dark-mode-text">Jl. Raya Keadilan No.39, Rangkapan Jaya Baru, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16434
                    </p>
                </div>
                <iframe class="m-0 p-0" title="Elbara Kreasi Map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9064612735992!2d106.7853925144214!3d-6.406050695364924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e916907ea677%3A0x539fe5a1e4c64903!2sJl.%20Raya%20Keadilan%20No.39%2C%20RT.4%2FRW.8%2C%20Rangkapan%20Jaya%20Baru%2C%20Kec.%20Pancoran%20Mas%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016434!5e0!3m2!1sen!2sid!4v1676000016127!5m2!1sen!2sid"
                    width="150" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div>
                <p class="text-base">Telepon Kami :</p>
                <a class="mt-1 text-xl text-white dark:text-dark-mode-text"
                    href="tel:{{ phone($phoneNumbers, 'ID', 1) }}">{{ phone($phoneNumbers, 'ID', 2) }}</a>
                <p class="mt-2 text-base">Whatsapp Kami :</p>
                <a class="mt-1 text-xl text-white dark:text-dark-mode-text"
                    href="https://api.whatsapp.com/send?phone={{ phone($whatsappNumbers, 'ID', 1) }}&text=Halo,%20Saya%20mau%20order"
                    target="_SEJ" rel="noreferrer">{{ phone($whatsappNumbers, 'ID', 2) }}</a>
                <p class="mt-2 text-base">Email Kami :</p>
                <a class="mt-1 text-xl text-white dark:text-dark-mode-text"
                    href="mailto:{{ $emailReceiver }}">{{ $emailReceiver }}</a>
                <div class="mt-4 flex gap-x-4">
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
    <div class="bg-onPrimaryDark p-3 text-primary">
        <div class="container">
            <p class="text-xs">©{{ date('Y') }} Elbara Kreasi Indonesia</p>
        </div>
    </div>
</footer>
