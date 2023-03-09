@extends('layouts.app')
@section('content')
    <section class="text-center px-4 mt-1 dark:text-white mb-24">


        <div class="container">
            <h2 class="text-3xl mt-8 font-bold">Produk Kami</h2>

            <ul class="button-group filter-button-group mt-5 mb-16 flex w-fit mx-auto border-[1px] border-[#DBDBDB] rounded-md divide-x-[1px] divide-[#DBDBDB] overflow-hidden text-[#A3A3A3] font-normal">
                <li>
                    <button class="p-3 text-base font-normal bg-secondary hover:bg-secondary transition-colors text-white hover:text-white" data-filter="*">Semua produk</button>
                </li>
                @foreach ($categories as $category)
                    <li>
                        <button class="p-3 text-base font-normal hover:bg-secondary transition-colors hover:text-white" data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
                    </li>
                @endforeach
            </ul>

            {{-- <div class="products mt-4 gap-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"> --}}
            <div class="products sm:-mr-4">
                @foreach ($products as $product)
                    <a class="product {{ $product->category->slug }} text-left block w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 sm:pb-6 sm:pr-6" href="{{ route('products.show', $product->slug) }}">
                        <div class="bg-[#d9d9d9] overflow-hidden w-full h-auto">
                            <img src="@if ($product->image) {{ asset('storage/' . $product->image) }}
                            @else /img/placeholder.webp @endif"
                                alt="" class="w-full h-full block object-center">
                        </div>
                        <p class="mt-4 text-base uppercase font-bold">{{ $product->name }}</p>
                        <p class="text-xs text-muted mt-1">{{ $product->category->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
