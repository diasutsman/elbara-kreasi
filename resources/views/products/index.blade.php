@extends('layouts.app')
@section('content')
    <section class="mt-1 mb-24 px-4 text-center dark:text-white">

        <div class="container">
            <h2 class="mt-8 text-3xl font-bold">Produk Kami</h2>

            <ul
                class="button-group filter-button-group mx-auto mt-5 mb-16 flex w-fit divide-x-[1px] divide-[#DBDBDB] overflow-hidden rounded-md border-[1px] border-[#DBDBDB] font-normal text-[#A3A3A3]">
                <li>
                    <button
                        class="bg-secondary p-3 text-base font-normal text-white transition-colors hover:bg-secondary hover:text-white"
                        data-filter="*">Semua produk</button>
                </li>
                @foreach ($categories as $category)
                    <li>
                        <button class="p-3 text-base font-normal transition-colors hover:bg-secondary hover:text-white"
                            data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
                    </li>
                @endforeach
            </ul>

            {{-- <div class="products mt-4 gap-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"> --}}
            <div class="products sm:-mr-4">
                @foreach ($products as $product)
                    <a class="product {{ $product->category->slug }} block w-full text-left sm:w-1/2 sm:pb-6 sm:pr-6 lg:w-1/3 xl:w-1/4"
                        href="{{ route('products.show', $product->slug) }}">
                        <div class="h-auto w-full overflow-hidden bg-[#d9d9d9]">
                            <img class="block h-full w-full object-center"
                                src="@if ($product->image) {{ asset('storage/' . $product->image) }}
                            @else /img/placeholder.webp @endif"
                                alt="">
                        </div>
                        <p class="mt-4 text-base font-bold uppercase">{{ $product->name }}</p>
                        <p class="mt-1 text-xs text-muted">{{ $product->category->name }}</p>
                    </a>
                @endforeach
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
