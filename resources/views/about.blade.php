@extends('layouts.app')
@section('content')
    {{-- Hero --}}
    <div class="px-4 dark:text-white">
        <div class="flex container mt-16 flex-wrap gap-y-8">
            <div class="md:flex-1">
                <div class="md:mr-14 flex flex-col justify-center items-start h-full gap-4">
                    <h1 class="text-4xl text-dark">
                        Tentang Kami
                    </h1>
                    <h1 class="text-xl text-gray-400">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis,
                        beatae inc
                    </h1>
                    <p class="text-sm text-dark">
                    Korem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim,  metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.
                    </p>
                    <a href="#"
                        class="text-sm px-7 py-3 text-white dark:text-dark-mode
                        bg-primary dark:bg-secondaryDark mt-4 hover:opacity-90 transition-opacity rounded-md">
                        Lihat Portfolio Kami
                    </a>
                </div>
            </div>
            <div class="md:flex-1 w-full">
                <div class="h-85 bg-[#CCCCCC]"></div>
            </div>
        </div>
    </div>


    {{-- Points --}}
    <div class="block bg-primary dark:bg-primaryVariantDark dark:text-dark-mode text-white text-center text-xl p-16 my-32">
        <div class="container flex flex-col md:flex-row gap-4">
            <div class="md:w-1/4">
                <div class="h-40 bg-[#CCCCCC]"></div>
            </div>
            <div class="md:w-3/4 md:flex">
                <div class="md:w-1/2">
                    <div class="flex md:pl-10 mb-10">
                        <div class="h-20 w-20 bg-white rounded-full"></div>
                        <div class="md:w-1/2 pl-6">
                            <p class="text-left text-2xl">Point 1</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eligendi.</p>

                        </div>
                    </div>

                    <div class="flex md:pl-10 mb-10">
                        <div class="h-20 w-20 bg-white rounded-full"></div>
                        <div class="md:w-1/2 pl-6">
                            <p class="text-left text-2xl">Point 2</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eligendi.</p>

                        </div>
                    </div>

                    <div class="flex md:pl-10 mb-10">
                        <div class="h-20 w-20 bg-white rounded-full"></div>
                        <div class="md:w-1/2 pl-6">
                            <p class="text-left text-2xl">Point 3</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eligendi.</p>

                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="flex md:pl-10 mb-10">
                        <div class="h-20 w-20 bg-white rounded-full"></div>
                        <div class="md:w-1/2 pl-6">
                            <p class="text-left text-2xl">Point 1</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eligendi.</p>

                        </div>
                    </div>

                    <div class="flex md:pl-10 mb-10">
                        <div class="h-20 w-20 bg-white rounded-full"></div>
                        <div class="md:w-1/2 pl-6">
                            <p class="text-left text-2xl">Point 2</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eligendi.</p>

                        </div>
                    </div>

                    <div class="flex md:pl-10 mb-10">
                        <div class="h-20 w-20 bg-white rounded-full"></div>
                        <div class="md:w-1/2 pl-6">
                            <p class="text-left text-2xl">Point 3</p>
                            <p class="text-left text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eligendi.</p>

                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>


    <a href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo,%20Saya%20mau%20order"
        class="block bg-primaryVariant dark:bg-primaryVariantDark dark:text-dark-mode text-white text-center text-xl p-9 mt-16 hover:opacity-90 transition-opacity mb-80">
        Ingin Memiliki Packaging Custom Untuk Produk Anda? <span class="underline">Hubungi Kami Sekarang</span>>
    </a> 
@endsection
