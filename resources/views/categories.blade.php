@extends('layouts.app')
@section('content')
    <section class="text-center px-4 mt-1 dark:text-white mb-24">

        
        <div class="container">
            <div class="w-full bg-placeholder h-[250px]"></div>
            <h2 class="text-3xl my-8">{{ $category->name }}</h2>
            <div class="mt-4 gap-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($category->products as $product)
                    <div class="text-left">
                        <div class="h-60 bg-[#d9d9d9] overflow-hidden">
                            <img src="@if ($product->image)
                            {{ asset('storage/' . $product->image) }}
                            @else
                                /img/placeholder.webp
                            @endif" alt="" class="w-full object-center">
                        </div>
                        <p class="mt-4 text-base uppercase">{{ $product->name }}</p>
                        <p class="text-xs text-muted mt-1">{{ $product->category->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
