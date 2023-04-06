@extends('layouts.app')
@section('content')
    <section class="mb-24 mt-1 px-4 text-center dark:text-white">

        <div class="container mx-auto">
            <div class="max-h-[250px] w-full overflow-hidden bg-placeholder">
                <img class="w-full"
                    src="@if ($category->header_image) {{ asset('storage/' . $category->header_image) }}
                @else
                /img/placeholder.webp @endif"
                    alt="{{ $category->name }}" loading="lazy">
            </div>
            <h2 class="my-8 text-3xl font-bold">{{ $category->name }}</h2>
            <div class="mt-4 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($category->products as $product)
                    <a class="group text-left" href="{{ route('products.show', $product->slug) }}">
                        <div class="grid overflow-hidden bg-placeholder">

                            <div
                                class="z-10 col-span-full row-span-full grid aspect-square place-items-center place-self-center rounded-full bg-white p-1 opacity-0 transition-opacity group-hover:opacity-100">
                                <p class="text-base font-bold text-primary dark:text-onPrimary">Lihat Produk</p>
                            </div>

                            <div
                                class="col-span-full row-span-full place-self-stretch bg-black opacity-0 transition-opacity group-hover:opacity-50">
                            </div>

                            <img class="col-span-full row-span-full w-full"
                                src="@if ($product->image) {{ asset('storage/' . $product->image) }}
                    @else
                        /img/placeholder.webp @endif"
                                alt="{{ $product->name }}" loading="lazy">
                        </div>
                        <p class="mt-5 text-base font-bold uppercase">{{ $product->name }}</p>
                        <p class="mt-1 text-xs text-muted">{{ $product->category->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
