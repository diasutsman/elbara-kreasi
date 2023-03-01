@extends('layouts.app')
@section('content')
    <section class="mt-16 text-center px-4 py-8 dark:text-white">
        <div class="container">
            <h2 class="text-3xl mb-8">{{ $category->name }}</h2>
            <div class="mt-4 gap-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($category->products as $product)
                    <div class="text-left">
                        <div class="h-60 bg-[#d9d9d9]">
                        </div>
                        <p class="mt-4 text-base uppercase">{{ $product->name }}</p>
                        <p class="text-xs text-muted mt-1">{{ $product->category->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
