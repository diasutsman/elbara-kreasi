@extends('layouts.app')
@section('content')
    <!-- Hero -->
    <div class="px-4 dark:text-white">
        <div class="flex container mt-16 flex-wrap gap-y-8">
            <div class="md:flex-1">
                <div class="md:mr-40 flex flex-col justify-center items-start h-full gap-4">
                    <h1 class="text-4xl">
                        Custom Cosmetic <br />
                        Packaging Solutions
                    </h1>
                    <p class="text-base">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis,
                        beatae incidunt quos officia nemo distinctio soluta. Voluptas sint
                        fugiat inventore?
                    </p>
                    <a href="#"
                        class="uppercase text-sm p-3 text-white dark:text-dark-mode
                        bg-secondary dark:bg-secondaryDark rounded-full mt-4 hover:opacity-90 transition-opacity">
                        custom sekarang!
                    </a>
                </div>
            </div>
            <div class="md:flex-1 w-full">
                <div class="h-80 bg-[#CCCCCC] rounded-[67px]"></div>
            </div>
        </div>
    </div>

    {{-- Category --}}
    <section class="mt-36 text-center px-4 dark:text-white">
        <div class="container">
            <h2 class="text-3xl">Kategori Pilihan</h2>
            <div class="mt-4 gap-12 grid grid-auto-fit-[15rem]">
                @foreach ($categories as $category)
                    <div>
                        <div class="min-h-[250px] bg-[#d9d9d9]">
                            <img src="https://source.unsplash.com/500x500?{{ $category->slug }}" alt="{{ $category->name }}"
                                class="w-full"
                                loading="lazy">
                        </div>
                        <p class="mt-5 text-base">{{ $category->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Best Seller Product --}}
    <section class="mt-16 text-center px-4 dark:text-white">
        <div class="container">
            <h2 class="text-3xl">Product Best Seller</h2>
            <div class="mt-4 gap-12 grid grid-auto-fit-[15rem]">
                @foreach ($products as $product)
                    <div class="text-left">
                        <div class="h-60 bg-[#d9d9d9]">
                        </div>
                        <p class="mt-4 text-base uppercase">{{ $product->name }}</p>
                        <p class="text-xs text-muted mt-1">{{ $product->category->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="mt-16 px-4">
        <a href="#"
            class="container block text-center bg-secondary dark:bg-secondaryDark text-white dark:text-dark-mode
        p-4 rounded-md hover:opacity-80 focus:bg-opacity-80 transition-opacity">
            Lihat Produk Lainnya
        </a>
    </div>

    <a href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo,%20Saya%20mau%20order"
        class="block bg-primaryVariant dark:bg-primaryVariantDark dark:text-dark-mode text-white text-center text-xl p-9 mt-16 hover:opacity-90 transition-opacity">
        Ingin Memiliki Packaging Custom Untuk Produk Anda? <span class="underline">Hubungi Kami Sekarang</span>>
    </a>

    {{-- Why Us & Contact us form --}}
    <div class="mt-24 px-4 mb-60 dark:text-white">
        <div class="container flex flex-col md:flex-row gap-16">
            {{-- Why Us --}}
            <div>
                <h1 class="text-4xl">Kenapa Kami?</h1>
                <h2 class="text-2xl mt-11">
                    Elbara Kreasi Indonesia - Solusi Packaging Custom Untuk Produk Kosmetik Profesional
                </h2>
                <p class="text-sm mt-5 tracking-wide font-thin text-desc">
                    Vorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
                    dictum est a, mattis
                    tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus,
                    ut interdum tellus
                    elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Vorem ipsum
                    dolor sit amet,
                    consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus.
                    Sed dignissim, metus
                    nec fringilla accumsan, risus sem sollicitudin lacus,
                    ut interdum tellus elit sed risus. Maecenas eget
                    condimentum velit, sit amet feugiat lectus.
                </p>
            </div>
            {{-- Contact us form --}}
            <div class="basis-64 flex-grow-0 flex-shrink-0">
                <h1 class="text-xl mb-3">Pemesanan via email</h1>
                <form action="" method="POST" class="flex flex-col gap-1 w-full">
                    <input type="text" name="name"
                        class="p-4 border-grey dark:border-greyDark border-2 text-grey font-medium placeholder:text-grey
                        dark:placeholder:text-greyDark placeholder:font-medium text-xs outline-none dark:bg-dark-mode"
                        placeholder="Nama Lengkap">
                    <input type="email" name="email"
                        class="p-4 border-grey dark:border-greyDark border-2 text-grey font-medium placeholder:text-grey
                        dark:placeholder:text-greyDark placeholder:font-medium text-xs outline-none dark:bg-dark-mode"
                        placeholder="Email">
                    <textarea placeholder="Pesan" name="message"
                        class="p-4 border-grey dark:border-greyDark border-2 text-grey font-medium placeholder:text-grey
                        dark:placeholder:text-greyDark placeholder:font-medium text-xs outline-none dark:bg-dark-mode"
                        id="message"></textarea>
                    <button type="submit"
                        class="px-5 py-2 bg-primary dark:text-dark-mode text-white mt-2 self-start rounded-md hover:opacity-90 transition-opacity">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
