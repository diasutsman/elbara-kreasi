@extends('layouts.app')
@section('content')
    {{-- Hero --}}
    <div class="dark:text-white">
        <div class="container mt-12 flex flex-wrap gap-y-8 md:mt-16">
            <div class="grid h-full flex-col items-start justify-center gap-4 md:grid-cols-2 md:gap-x-16">
                <h1 class="text-3xl font-bold text-dark md:text-4xl">
                    Tentang Kami
                </h1>
                <div class="md:col-start-2 md:row-start-1 md:row-end-7">
                    <div class="h-85 bg-[#CCCCCC]"></div>
                </div>
                <h1 class="text-gray-400 md:text-xl">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis,
                    beatae inc
                </h1>
                <p class="text-xs text-dark md:text-sm">
                    Korem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a,
                    mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut
                    interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class
                    aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent
                    auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac
                    rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet
                    lacinia. Aliquam in elementum tellus.
                </p>
                <a class="justify-self-start rounded-md bg-primary px-7 py-3 text-sm text-white transition-opacity hover:opacity-90 dark:bg-secondaryDark dark:text-dark-mode md:mt-4 md:w-auto"
                    href="{{ route('portfolios.index') }}">
                    Lihat Portfolio Kami
                </a>
            </div>
        </div>
    </div>

    {{-- Points --}}
    <div
        class="mb-40 mt-25 block bg-primary px-1 text-white dark:bg-primaryVariantDark dark:text-dark-mode md:my-32 md:text-xl">
        <div class="container grid justify-center gap-6 py-10 md:grid-flow-row md:grid-cols-3 md:grid-rows-3">

            <div class="flex gap-x-4 md:col-start-2">
                <div>
                    <div class="aspect-square w-10 rounded-full bg-white"></div>
                </div>
                <div class="md:w-1/2">
                    <p class="font-bold md:text-2xl">Point 1</p>
                    <p class="md:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                        eligendi.</p>
                </div>
            </div>
            <div class="flex gap-x-4">
                <div>
                    <div class="aspect-square w-10 rounded-full bg-white"></div>
                </div>
                <div class="md:w-1/2">
                    <p class="font-bold md:text-2xl">Point 2</p>
                    <p class="md:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                        eligendi.</p>
                </div>
            </div>
            <div class="flex gap-x-4 md:col-start-2">
                <div>
                    <div class="aspect-square w-10 rounded-full bg-white"></div>
                </div>
                <div class="md:w-1/2">
                    <p class="font-bold md:text-2xl">Point 3</p>
                    <p class="md:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                        eligendi.</p>
                </div>
            </div>
            <div class="flex gap-x-4">
                <div>
                    <div class="aspect-square w-10 rounded-full bg-white"></div>
                </div>
                <div class="md:w-1/2">
                    <p class="font-bold md:text-2xl">Point 4</p>
                    <p class="md:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                        eligendi.</p>
                </div>
            </div>
            <div class="flex gap-x-4 md:col-start-2">
                <div>
                    <div class="aspect-square w-10 rounded-full bg-white"></div>
                </div>
                <div class="md:w-1/2">
                    <p class="font-bold md:text-2xl">Point 5</p>
                    <p class="md:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                        eligendi.</p>
                </div>
            </div>
            <div class="flex gap-x-4">
                <div>
                    <div class="aspect-square w-10 rounded-full bg-white"></div>
                </div>
                <div class="md:w-1/2">
                    <p class="font-bold md:text-2xl">Point 6</p>
                    <p class="md:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                        eligendi.</p>
                </div>
            </div>

        </div>
    </div>

    <a class="mb-25 mt-16 block bg-primaryVariant p-9 text-center text-xl font-bold text-white transition-opacity hover:opacity-90 dark:bg-primaryVariantDark dark:text-dark-mode"
        href="https://api.whatsapp.com/send?phone={{ phone($whatsappNumbers, 'ID', 1) }}&text=Halo,%20Saya%20mau%20order"
        target="_SEJ" rel="noreferrer">
        Ingin Memiliki Packaging Custom Untuk Produk Anda? <span class="underline">Hubungi Kami Sekarang</span>
    </a>
@endsection
