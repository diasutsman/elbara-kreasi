@extends('layouts.app')
@section('content')
    <section class="mb-24 mt-1 text-center dark:text-white">

        <div class="container">
            <h2 class="mt-8 text-3xl font-bold">Produk Kami</h2>

            @livewire('products')
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
    </script>
@endsection
