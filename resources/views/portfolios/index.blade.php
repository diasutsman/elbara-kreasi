@extends('layouts.app')
@section('content')
    <section class="mb-24 mt-1 px-6 text-center dark:text-white">

        <div class="container mx-auto">
            <h2 class="mb-5 mt-8 text-3xl font-bold">Portfolio Kami</h2>
            <div class="px-10 sm:px-0">
                <div class="mb-3 mt-5 flex justify-between">
                    <div class="pagination-button-group flex flex-wrap">
                        @foreach (range(1, $portfolios->count() / 10) as $page)
                            <button
                                class="@if ($page == 1) text-secondary border-secondary border-opacity-100 @endif @if($page != 1) border-opacity-10 @endif grid h-11 w-11 place-items-center rounded-md border border-solid border-black transition-colors hover:border-secondary hover:text-secondary"
                                data-filter=".page-{{ $page }}">
                                {{ $page }}
                            </button>
                        @endforeach
                        {{-- {{ $portfolios->links() }} --}}
                    </div>
                    <button
                        class="shuffle-btn hidden h-11 w-11 place-items-center rounded-md border border-solid border-black border-opacity-5 transition-colors hover:bg-secondary hover:text-white md:grid">
                        <svg class="bi bi-shuffle" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5z" />
                            <path
                                d="M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z" />
                        </svg>
                    </button>
                </div>
                <div class="portfolios sm:-mr-6 sm:px-0">
                    @foreach (range(0, $portfolios->count() - 1) as $index)
                        <div
                            class="portfolio page-{{ floor($index / 10) + 1 }} block h-auto w-full pb-6 text-left sm:w-1/2 sm:pr-6 md:w-1/3 lg:w-1/4">
                            <div class="h-auto w-full overflow-hidden bg-[#d9d9d9]">
                                <img class="block h-full w-full object-center"
                                    src="@if ($portfolios[$index]->image) {{ asset('storage/' . $portfolios[$index]->image) }}
                                @else /img/placeholder.webp @endif"
                                    loading="lazy" alt="" width="100" height="100">
                            </div>
                            <p class="mt-4 text-base font-bold uppercase">{{ $portfolios[$index]->title }}</p>
                            <p class="mt-1 text-xs text-muted">{{ $portfolios[$index]->client }}</p>
                        </div>
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
        const iso = new Isotope('.portfolios', {
            itemSelector: '.portfolio',
            layoutMode: 'fitRows'
        });

        const shuffleBtn = document.querySelector('.shuffle-btn');
        shuffleBtn.addEventListener('click', () => {
            iso.shuffle();
        });

        const paginationButtons = document.querySelectorAll('.pagination-button-group button');

        paginationButtons.forEach(button => {
            button.addEventListener('click', () => {
                paginationButtons.forEach(btn => {
                    btn.classList.remove('border-secondary', 'text-secondary', 'border-opacity-100');
                    btn.classList.add('border-opacity-10');
                })
                button.classList.add('border-secondary', 'text-secondary', 'border-opacity-100');
                button.classList.remove('border-opacity-10');
                iso.arrange({
                    filter: button.dataset.filter
                });
            });
        })

        iso.arrange({
            filter: '.page-1'
        });
    </script>
@endsection
