@extends('layouts.app')
@section('content')
    {{-- Hero --}}
    <div class="px-4 dark:text-white">
        <div class="container mt-16 flex flex-wrap gap-y-8">
            <div class="md:flex-1">
                <div class="flex h-full flex-col items-start justify-center gap-4 md:mr-14">
                    <h1 class="text-4xl font-bold text-dark">
                        Tentang Kami
                    </h1>
                    <h1 class="text-xl text-gray-400">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis,
                        beatae inc
                    </h1>
                    <p class="text-sm text-dark">
                        Korem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a,
                        mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut
                        interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class
                        aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent
                        auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac
                        rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet
                        lacinia. Aliquam in elementum tellus.
                    </p>
                    <a class="mt-4 rounded-md bg-primary px-7 py-3 text-sm text-white transition-opacity hover:opacity-90 dark:bg-secondaryDark dark:text-dark-mode"
                        href="{{ route('portfolios.index') }}">
                        Lihat Portfolio Kami
                    </a>
                </div>
            </div>
            <div class="w-full md:flex-1">
                <div class="h-85 bg-[#CCCCCC]"></div>
            </div>
        </div>
    </div>

    {{-- Points --}}
    <div class="my-32 block bg-primary p-16 text-center text-xl text-white dark:bg-primaryVariantDark dark:text-dark-mode">
        <div class="container flex flex-col gap-4 md:flex-row">
            <div class="md:w-1/4">
                <div class="h-40 bg-[#CCCCCC]"></div>
            </div>
            <div class="md:flex md:w-3/4">
                <div class="md:w-1/2">
                    <div class="mb-10 flex md:pl-10">
                        <div class="h-20 w-20 rounded-full bg-white"></div>
                        <div class="pl-6 md:w-1/2">
                            <p class="text-left text-2xl">Point 1</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                                eligendi.</p>

                        </div>
                    </div>

                    <div class="mb-10 flex md:pl-10">
                        <div class="h-20 w-20 rounded-full bg-white"></div>
                        <div class="pl-6 md:w-1/2">
                            <p class="text-left text-2xl">Point 2</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                                eligendi.</p>

                        </div>
                    </div>

                    <div class="mb-10 flex md:pl-10">
                        <div class="h-20 w-20 rounded-full bg-white"></div>
                        <div class="pl-6 md:w-1/2">
                            <p class="text-left text-2xl">Point 3</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                                eligendi.</p>

                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="mb-10 flex md:pl-10">
                        <div class="h-20 w-20 rounded-full bg-white"></div>
                        <div class="pl-6 md:w-1/2">
                            <p class="text-left text-2xl">Point 1</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                                eligendi.</p>

                        </div>
                    </div>

                    <div class="mb-10 flex md:pl-10">
                        <div class="h-20 w-20 rounded-full bg-white"></div>
                        <div class="pl-6 md:w-1/2">
                            <p class="text-left text-2xl">Point 2</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                                eligendi.</p>

                        </div>
                    </div>

                    <div class="mb-10 flex md:pl-10">
                        <div class="h-20 w-20 rounded-full bg-white"></div>
                        <div class="pl-6 md:w-1/2">
                            <p class="text-left text-2xl">Point 3</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni,
                                eligendi.</p>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <a class="mb-80 mt-16 block bg-primaryVariant p-9 text-center text-xl font-bold text-white transition-opacity hover:opacity-90 dark:bg-primaryVariantDark dark:text-dark-mode"
        href="https://api.whatsapp.com/send?phone={{ phone($whatsappNumbers, 'ID', 1) }}&text=Halo,%20Saya%20mau%20order"
        target="_SEJ" rel="noreferrer">
        Ingin Memiliki Packaging Custom Untuk Produk Anda? <span class="underline">Hubungi Kami Sekarang</span>
    </a>
@endsection
