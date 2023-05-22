<div class="container">
    @if ($products->count() == 0)
        <h1 class="text-center text-2xl">Product with query "{{ $query }}" not found</h1>
    @endif
    <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($products as $product)
            <a class="group text-left" href="{{ route('products.show', $product->slug) }}">
                <div class="grid overflow-hidden">

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

    @if ($products->hasMorePages())
        <button
            class="showMore mx-auto mt-16 flex w-1/2 flex-col items-center gap-y-2 border-t border-solid border-onPrimary py-3 text-center text-onPrimary max-sm:w-full"
            wire:click.prevent="loadMore">
            <p>Lihat Lebih Banyak</p>
            <div wire:loading.remove>
                <svg class="animate-bounce" width="18" height="12" viewBox="0 0 18 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.04908 11.5905L0.396686 3.69119C-0.132229 3.14521 -0.132229 2.26234 0.396686 1.72217L1.66833 0.409487C2.19725 -0.136496 3.05252 -0.136496 3.5758 0.409487L9 6.00871L14.4242 0.409487C14.9531 -0.136496 15.8084 -0.136496 16.3317 0.409487L17.6033 1.72217C18.1322 2.26815 18.1322 3.15102 17.6033 3.69119L9.95092 11.5905C9.43326 12.1365 8.57799 12.1365 8.04908 11.5905Z"
                        fill="#518646" />
                </svg>
            </div>
            <div wire:loading>
                <svg class="bi bi-arrow-repeat animate-spin" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                    <path fill-rule="evenodd"
                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                </svg>
            </div>

        </button>
    @endif
</div>
