@extends('layouts.app')
@section('content')
    <section class="container mx-auto mb-24 mt-12 px-4 dark:text-white">
        <section class="flex flex-col gap-10 md:flex-row">
            <div class="flex shrink basis-[400px] flex-col gap-y-6">
                <figure class="relative mx-auto w-full max-w-[400px] cursor-zoom-in overflow-hidden"
                    x-data="{
                        zoom(e) {
                            var zoomer = e.currentTarget;
                            e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
                            e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
                            x = offsetX / zoomer.offsetWidth * 100
                            y = offsetY / zoomer.offsetHeight * 100
                            zoomer.style.backgroundPosition = x + '% ' + y + '%';
                        }
                    }"
                    style="background-image: url('@if ($product->image) {{ asset('storage/' . $product->image) }}@else{{ asset('img/placeholder.webp') }} @endif')" @mousemove="zoom(event)" @mouseleave="$el.style.backgroundPosition=null">
                    <img class="block w-full transition-opacity duration-500 hover:opacity-0"
                        src="@if ($product->image) {{ asset('storage/' . $product->image) }}@else {{ asset('img/placeholder.webp') }} @endif"
                        alt="{{ $product->name }}">
                </figure>

                <div class="pswp-gallery flex flex-wrap justify-center gap-2" id="my-gallery">
                    @foreach ($product->portfolios as $portfolio)
                        <a class="w-[70px]" data-pswp-width="700" data-pswp-height="700" href="@if ($portfolio->image) {{ asset('storage/' . $portfolio->image) }}@else {{ asset('img/placeholder.webp') }} @endif"
                            target="_blank">
                            <img src="@if ($portfolio->image) {{ asset('storage/' . $portfolio->image) }}@else {{ asset('img/placeholder.webp') }} @endif"
                                alt="{{ $portfolio->title }}" loading="lazy" />
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex-1" x-data="{ price: {{ $product->price }}, quantity: 1 }">
                <h1 class="text-3xl font-bold text-dark">{{ $product->name }}</h1>
                <p class="mt-4 text-2xl text-secondary"
                    x-text='new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                  }).format(quantity * price)'>
                    @currency($product->price)</p>

                <form class="mt-8" action="#" method="POST">
                    <label class="block text-[#B0B0B0]" for="quantity">Quantity</label>
                    <div class="mt-2 flex w-fit overflow-hidden rounded-md border-[1px] border-secondary">
                        <button class="bg-secondary px-4 py-2 text-white" type="button"
                            onclick="this.parentElement.querySelector('input[type=number]').stepDown()"
                            @click="quantity = Math.max(1, quantity - 1)">-</button>
                        <input class="w-16 text-center focus-visible:outline-none" id="quantity" type="number"
                            name="quantity" min="1" value="1" readonly>
                        <button class="bg-secondary px-4 py-2 text-white" type="button"
                            onclick="this.parentElement.querySelector('input[type=number]').stepUp()"
                            @click="quantity++">+</button>
                    </div>

                    <button
                        class="mt-12 w-full rounded-md bg-secondary py-4 font-bold text-white transition-opacity hover:opacity-90"
                        type="submit">Beli
                        Sekarang</button>

                    <button
                        class="mt-4 w-full rounded-md bg-primary py-4 font-bold text-white transition-opacity hover:opacity-90"
                        type="submit">Tambahkan
                        ke keranjang</button>
                </form>
            </div>

            <div class="basis-0">
                <p class="w-full bg-primary p-9 text-center text-2xl font-bold text-white md:w-min md:px-4 md:py-9">
                    Ingin membuat packaging custom? <span class="whitespace-nowrap">hubungi kami</span> <a class="underline"
                        href="https://api.whatsapp.com/send?phone={{ phone($whatsappNumbers, 'ID', 1) }}&text=Halo,%20Saya%20mau%20order"
                        target="_SEJ" rel="noreferrer">Disini</a>
                    >
                </p>

                <hr class="my-8 border-[1px] border-[#B0B0B0]">

                <div class="flex flex-col gap-y-8">
                    <div>
                        <p class="text-base font-bold text-dark"><i class="bi bi-hand-thumbs-up-fill"></i> Kualitas Terjamin
                        </p>
                        <p class="text-xs text-[#777]">Jaminan kualitas terbaik dari produsen terbaik</p>
                    </div>

                    <div>
                        <p class="text-base font-bold text-dark"><i class="bi bi-hand-thumbs-up-fill"></i> Jasa Design</p>
                        <p class="text-xs text-[#777]">Lengkap dengan jasa design untuk packaging custom anda</p>
                    </div>

                    <div>
                        <p class="text-base font-bold text-dark"><i class="bi bi-hand-thumbs-up-fill"></i> Pembayaran Mudah
                        </p>
                        <p class="text-xs text-[#777]">Dengan berbagai macam metode pembayaran yang terpercaya</p>
                    </div>

                    <div>
                        <p class="text-base font-bold text-dark"><i class="bi bi-hand-thumbs-up-fill"></i> Harga Terbaik</p>
                        <p class="text-xs text-[#777]">Harga yang dapat bersaing dengan kompetitor di bidang packaging</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-8" x-data="{ tab: 1 }">
            <div class="ml-4 flex gap-x-4 font-bold md:ml-8">
                <button class="border-2 border-b-0 border-secondary p-3 transition-colors" @click="tab = 1"
                    :class="tab == 1 && 'text-white bg-primary'">Deskripsi Produk</button>
                <button class="border-2 border-b-0 border-secondary p-3 transition-colors" @click="tab = 2"
                    :class="tab == 2 && 'text-white bg-primary'">Informasi Tambahan</button>
            </div>

            <div class="border-y-2 border-secondary px-8 py-7">
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
            <h2 class="text-xl font-bold text-dark">Produk Terkait</h2>

            <div class="owl-carousel related-carousel mt-10 flex gap-x-9 overflow-x-hidden">
                @foreach ($related_products as $product)
                    <div>
                        <a class="block min-h-[184px] w-full bg-placeholder"
                            href="{{ route('products.show', $product->slug) }}">
                            <img src="@if ($product->image) {{ asset('storage/' . $product->image) }}
                                @else
                                    {{ asset('/images/placeholder.png') }} @endif"
                                alt="">
                        </a>
                        <a class="mt-4 block text-center font-bold text-dark"
                            href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                    </div>
                @endforeach
            </div>
        </section>

    </section>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="{{ asset('/js/owlcarousel/owl.carousel.min.js') }}"></script>

    <script type="module">
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    margin: 35,
                    items: 1,
                    nav: true,
                    responsive: {
                        640: {
                            items: 2,
                        },
                        768: {
                            items: 3,
                        },
                        1024: {
                            items: 4,
                        }
                    }
                });
            });
            import PhotoSwipeLightbox from 'https://unpkg.com/photoswipe/dist/photoswipe-lightbox.esm.js';
            const lightbox = new PhotoSwipeLightbox({
                gallery: '#my-gallery',
                children: 'a',
                pswpModule: () => import('https://unpkg.com/photoswipe')
            });
            lightbox.on('uiRegister', function() {
                lightbox.pswp.ui.registerElement({
                    name: 'caption text-white text-center absolute left-1/2 -translate-x-1/2 bottom-10 font-bold text-2xl',
                    ariaLabel: 'Toggle zoom',
                    order: 9,
                    html: 'Test',
                    appendTo: 'root',
                    onInit: (el, pswp) => {
                        lightbox.pswp.on('change', () => {
                            const currSlideElement = lightbox.pswp.currSlide.data.element;
                            let captionHTML = '';
                            if (currSlideElement) {
                                // get caption from alt attribute
                                captionHTML = currSlideElement.querySelector('img').getAttribute(
                                    'alt');
                            }
                            el.innerHTML = captionHTML || '';
                        });
                    }
                })
            });
            lightbox.init();
        </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('js/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/photoswipe@5.2.2/dist/photoswipe.css">
    @vite('resources/css/product.css')
@endsection
