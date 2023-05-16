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
        Livewire.on('loadedMore', () => {
            initIsotope();
        })

        function initIsotope() {
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
        }
        initIsotope();
    </script>
@endsection
