@extends('layouts.app')
@section('content')
    <section class="container mx-auto px-4 dark:text-white mb-24 mt-12">
        <section class="flex flex-col md:flex-row gap-10">
            <div class="flex flex-col gap-y-6 basis-[400px] shrink">
                {{-- <div class="w-full min-h-[400px] bg-placeholder"></div> --}}
                <img class="max-w-[400px] mx-auto w-full" src="{{ asset('storage/' . $product->image) }}" alt="">
                {{-- <div class="flex gap-x-2 justify-center">
                    <div class="h-16 w-16 bg-placeholder"></div>
                    <div class="h-16 w-16 bg-placeholder"></div>
                    <div class="h-16 w-16 bg-placeholder"></div>
                </div> --}}
                <div class="pswp-gallery flex gap-2 justify-center flex-wrap" id="my-gallery">
                    @foreach ($product->portfolios as $portfolio)
                        <a href="{{ $portfolio->image }}" target="_blank" data-pswp-width="700" class="w-[70px]"
                            data-pswp-height="700" >
                            <img src="{{ $portfolio->image }}"
                                alt="{{ $portfolio->title }}" loading="lazy"/>
                        </a>
                        {{-- <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/1/img-2500.jpg" target="_blank" data-pswp-width="462" 
                        data-pswp-height="616" >
                            <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/1/img-200.jpg" alt="" />
                        </a> --}}
                    @endforeach
                    {{-- <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/1/img-2500.jpg" target="_blank">
                        <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/1/img-200.jpg" alt="" />
                    </a>
                    <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/2/img-2500.jpg" target="_blank">
                        <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/2/img-200.jpg" alt="" />
                    </a>
                    <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/3/img-2500.jpg" target="_blank">
                        <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/3/img-200.jpg" alt="" />
                    </a> --}}
                </div>
            </div>

            <div class="flex-1" x-data="{ price: {{ $product->price }}, quantity: 1 }">
                <h1 class="text-3xl text-dark font-bold">{{ $product->name }}</h1>
                <p class="text-secondary text-2xl mt-4"
                    x-text='new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                  }).format(quantity * price)'>
                    @currency($product->price)</p>

                <form action="#" method="POST" class="mt-8">
                    <label class="text-[#B0B0B0] block" for="quantity">Quantity</label>
                    <div class="flex border-[1px] border-secondary rounded-md overflow-hidden mt-2 w-fit">
                        <button class="bg-secondary px-4 py-2 text-white" type="button"
                            onclick="this.parentElement.querySelector('input[type=number]').stepDown()"
                            @click="quantity = Math.max(1, quantity - 1)">-</button>
                        <input type="number" name="quantity" id="quantity"
                            class="w-16 text-center focus-visible:outline-none" min="1" value="1" readonly>
                        <button class="bg-secondary px-4 py-2 text-white" type="button"
                            onclick="this.parentElement.querySelector('input[type=number]').stepUp()"
                            @click="quantity++">+</button>
                    </div>

                    <button type="submit"
                        class="w-full bg-secondary py-4 hover:opacity-90 transition-opacity text-white mt-12 rounded-md font-bold">Beli
                        Sekarang</button>

                    <button type="submit"
                        class="w-full bg-primary py-4 hover:opacity-90 transition-opacity text-white mt-4 rounded-md font-bold">Tambahkan
                        ke keranjang</button>
                </form>
            </div>

            <div class="basis-0">
                <p class="w-full md:w-min p-9 md:py-9 md:px-4 bg-primary text-white font-bold text-2xl text-center">
                    Ingin membuat packaging custom? <span class="whitespace-nowrap">hubungi kami</span> <a class="underline"
                        href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo,%20Saya%20mau%20order">Disini</a>
                    >
                </p>

                <hr class="my-8 border-[1px] border-[#B0B0B0]">

                <div class="flex flex-col gap-y-8">
                    <div>
                        <p class="text-base text-dark font-bold"><i class="bi bi-hand-thumbs-up-fill"></i> Kualitas Terjamin
                        </p>
                        <p class="text-xs text-[#777]">Jaminan kualitas terbaik dari produsen terbaik</p>
                    </div>

                    <div>
                        <p class="text-base text-dark font-bold"><i class="bi bi-hand-thumbs-up-fill"></i> Jasa Design</p>
                        <p class="text-xs text-[#777]">Lengkap dengan jasa design untuk packaging custom anda</p>
                    </div>

                    <div>
                        <p class="text-base text-dark font-bold"><i class="bi bi-hand-thumbs-up-fill"></i> Pembayaran Mudah
                        </p>
                        <p class="text-xs text-[#777]">Dengan berbagai macam metode pembayaran yang terpercaya</p>
                    </div>

                    <div>
                        <p class="text-base text-dark font-bold"><i class="bi bi-hand-thumbs-up-fill"></i> Harga Terbaik</p>
                        <p class="text-xs text-[#777]">Harga yang dapat bersaing dengan kompetitor di bidang packaging</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-8" x-data="{ tab: 1 }">
            <div class="font-bold flex gap-x-4 ml-4 md:ml-8">
                <button @click="tab = 1" class="p-3 border-secondary border-2 border-b-0 transition-colors"
                    :class="tab == 1 && 'text-white bg-primary'">Deskripsi Produk</button>
                <button @click="tab = 2" class="p-3 border-secondary border-2 border-b-0 transition-colors"
                    :class="tab == 2 && 'text-white bg-primary'">Informasi Tambahan</button>
            </div>

            <div class="px-8 py-7 border-y-2 border-secondary">
                <div x-show="tab == 1" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden">
                    {!! $product->description !!}
                </div>

                <div x-show="tab == 2" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden">
                    {!! $product->additional_information !!}
                </div>
            </div>


        </section>


        <section class="mt-16">
            <h2 class="text-xl font-bold">Produk Terkait</h2>

            <div class="mt-10 owl-carousel flex gap-x-9">
                @foreach (range(1, 4) as $index)
                    <div>
                        <div class="min-h-[184px] w-full bg-placeholder"></div>
                        <p class="mt-4">Nama Produk</p>
                    </div>
                @endforeach
            </div>
        </section>

    </section>
@endsection
