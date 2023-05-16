<div>
    <div class="px-8">
        <ul
            class="button-group filter-button-group mx-auto mb-16 mt-5 flex w-fit flex-wrap justify-center divide-x-[1px] divide-[#DBDBDB] overflow-hidden rounded-md border-[1px] border-[#DBDBDB] font-normal text-[#A3A3A3]">
            <li>
                <button
                    class="h-full bg-secondary p-3 text-base font-normal text-white transition-colors hover:bg-secondary hover:text-white"
                    data-filter="*">Semua produk</button>
            </li>
            @foreach ($categories as $category)
                <li>
                    <button
                        class="h-full p-3 text-base font-normal transition-colors hover:bg-secondary hover:text-white"
                        data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="sm:px-0">
        <div class="products -mr-4">
            @foreach ($products as $product)
                <a class="product {{ $product->category->slug }} block w-1/2 pb-6 pr-6 text-left md:w-1/3 lg:w-1/4"
                    href="{{ route('products.show', $product->slug) }}">
                    <div class="grid h-auto w-full overflow-hidden bg-placeholder">
                        <img class="col-span-full row-span-full block h-full w-full object-center"
                            src="@if ($product->image) {{ asset('storage/' . $product->image) }}
                        @else /img/placeholder.webp @endif"
                            alt="{{ $product->name }}" height="100" width="100" loading="lazy">

                        @if ($product->is_best_seller)
                            <div class="col-span-full row-span-full p-2">
                                <p class="w-fit bg-onPrimary px-2 py-1 text-white sm:px-3 sm:py-2">Best Seller</p>
                            </div>
                        @endif
                    </div>
                    <p class="mt-4 text-base font-bold uppercase">{{ $product->name }}</p>
                    <p class="mt-1 text-xs text-muted">{{ $product->category->name }}</p>
                </a>
            @endforeach
        </div>
    </div>
    @if ($products->hasMorePages())
        <button
            class="showMore flex w-full flex-col items-center gap-y-2 border-t border-solid border-onPrimary py-3 text-center text-onPrimary"
            wire:click.prevent="loadMore" x-init="$wire.on('loadedMore', () => {loading = false})" @click="loading = true" x-data="{ loading: false }" :disabled="loading">
            <p>Lihat Lebih Banyak</p>
            <template x-if="!loading">
                <svg class="animate-bounce" width="18" height="12" viewBox="0 0 18 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.04908 11.5905L0.396686 3.69119C-0.132229 3.14521 -0.132229 2.26234 0.396686 1.72217L1.66833 0.409487C2.19725 -0.136496 3.05252 -0.136496 3.5758 0.409487L9 6.00871L14.4242 0.409487C14.9531 -0.136496 15.8084 -0.136496 16.3317 0.409487L17.6033 1.72217C18.1322 2.26815 18.1322 3.15102 17.6033 3.69119L9.95092 11.5905C9.43326 12.1365 8.57799 12.1365 8.04908 11.5905Z"
                        fill="#518646" />
                </svg>
            </template>
            <template x-if="loading">
                <svg class="bi bi-arrow-repeat animate-spin" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                    <path fill-rule="evenodd"
                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                </svg>
            </template>

        </button>
    @endif
</div>

