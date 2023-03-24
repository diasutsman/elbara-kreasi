@extends('layouts.app')
@section('content')
    <section class="mt-1 mb-24 px-4 text-center dark:text-white">

        <div class="container">
            <div class="h-[250px] w-full overflow-hidden bg-placeholder">
                <img class="w-full" src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
            </div>
            <h2 class="my-8 text-3xl font-bold">{{ $category->name }}</h2>
            <div class="mt-4 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($category->products as $product)
                    <a class="text-left" href="{{ route('products.show', $product->slug) }}">
                        <div class="overflow-hidden bg-[#d9d9d9]">
                            <img class="w-full"
                                src="@if ($product->image) {{ asset('storage/' . $product->image) }}
                            @else
                                /img/placeholder.webp @endif"
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
