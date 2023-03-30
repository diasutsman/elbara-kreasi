@extends('admin.layouts.main')

@section('content')
    <!--Container-->
    <div class="container mx-auto w-full px-2 md:w-4/5 xl:w-3/5">

        <!--Card-->
        <div class="mt-6 rounded bg-white p-8 shadow" id="card-wrapper">

            <form class="mb-4 flex items-start justify-center gap-x-2" action="{{ route('admin.portfolios.store') }}"
                method="POST" onsubmit="onAdd(event)">
                @csrf

                <input class="bg-gray-100 p-2 transition focus:ring-2 focus-visible:outline-none" type="text"
                    placeholder="Portfolio Title" name="title" required>

                <label class="grid basis-16" x-data="ImagePreview('{{ asset('/img/placeholder.webp') }}')">
                    <input class="peer col-span-full row-span-full hidden" type="file" @change="previewImage(event)"
                        name="image">

                    <img class="col-span-full row-span-full w-full peer-invalid:aspect-square" loading="lazy"
                        src="{{ asset('/img/placeholder.webp') }}" :src="src"/>

                    <div
                        class="col-span-full row-span-full grid cursor-pointer place-content-center bg-black bg-opacity-50 opacity-0 transition-opacity hover:opacity-100">
                        <svg class="col-span-full row-span-full h-5 w-5" class="bi bi-upload"
                            xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 16 16">
                            <path
                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"
                                stroke-width="5" />
                            <path
                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"
                                stroke-width="5" />
                        </svg>
                    </div>
                </label>

                <div x-data="{ productId: '' }">
                    <input id="product" type="text" list="products" placeholder="Product Name"
                        x-on:change="productId = [...$refs.products.children].find(prod => prod.value == $refs.productInput.value).dataset.value"
                        x-ref="productInput">

                    <datalist id="products" x-ref="products">
                        @foreach ($products as $product)
                            <option data-value="{{ $product->id }}" value="{{ $product->name }}" />
                        @endforeach
                    </datalist>

                    <input type="hidden" name="product_id" x-model="productId">
                </div>

                <button
                    class="btn-add mr-0 inline-flex items-center gap-x-1 rounded-md bg-green-600 p-2 text-sm font-medium text-white hover:bg-green-700"
                    type="submit">
                    <svg class="bi bi-plus-lg h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                    <p>Add Data</p>
                </button>
            </form>

            <table class="stripe hover" id="portfolios-table" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">Title</th>
                        <th data-orderable="false">Image</th>
                        <th data-priority="2">Product</th>
                        <th data-orderable="false">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>

            </table>

        </div>
        <!--/Card-->

    </div>
    <!--/container-->
@endsection

@section('scripts')
    <script src="/js/portfolios.js"></script>
@endsection
