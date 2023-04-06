@extends('layouts.app')
@section('content')
    <section class="mb-24 mt-1 px-6 text-center dark:text-white">

        <div class="container mx-auto">
            <h2 class="mt-8 text-3xl font-bold">Produk Kami</h2>

            <ul
                class="button-group filter-button-group mx-auto mb-16 mt-5 flex w-fit flex-wrap justify-center overflow-hidden font-normal text-[#A3A3A3] md:flex-nowrap md:divide-x-[1px] md:divide-[#DBDBDB] md:rounded-md md:border-[1px] md:border-[#DBDBDB]">
                <li>
                    <button
                        class="h-full bg-secondary p-3 text-base font-normal text-white transition-colors hover:bg-secondary hover:text-white"
                        data-filter="*">Semua produk</button>
                </li>
                @foreach ($categories as $category)
                    <li>
                        <button
                            class="h-full p-3 text-base font-normal transition-colors hover:bg-secondary hover:text-white"
                            data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
                    </li>
                @endforeach
            </ul>
            <div class="px-10 sm:px-0">
                <div class="products sm:-mr-6">
                    @foreach ($products as $product)
                        <a class="product {{ $product->category->slug }} block w-full text-left sm:w-1/2 sm:pb-6 sm:pr-6 lg:w-1/3 xl:w-1/4"
                            href="{{ route('products.show', $product->slug) }}">
                            <div class="grid h-auto w-full overflow-hidden bg-placeholder">
                                <img class="col-span-full row-span-full block h-full w-full object-center"
                                    src="@if ($product->image) {{ asset('storage/' . $product->image) }}
                                @else /img/placeholder.webp @endif"
                                    alt="{{ $product->name }}" height="100" width="100" loading="lazy">

                                @if ($product->is_best_seller)
                                    <div class="col-span-full row-span-full p-2">
                                        <p class="w-fit bg-onPrimary px-3 py-2 text-white">Best Seller</p>
                                    </div>
                                @endif
                            </div>
                            <p class="mt-4 text-base font-bold uppercase">{{ $product->name }}</p>
                            <p class="mt-1 text-xs text-muted">{{ $product->category->name }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
        /* Isotope Code */
        const iso = new Isotope('.products', {
            itemSelector: '.product',
            layoutMode: 'fitRows'
        })

        const filterButtons = document.querySelectorAll('.filter-button-group button');

        filterButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                filterButtons.forEach(button => button.classList.remove('bg-secondary', 'text-white'))
                button.classList.add('bg-secondary', 'text-white')
                iso.arrange({
                    filter: event.target.dataset.filter
                })
            })
        })
    </script>
@endsection
