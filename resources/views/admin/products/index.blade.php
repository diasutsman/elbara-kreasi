@extends('admin.layouts.main')

@section('content')
    <!--Container-->
    <div class="h-full w-full overflow-x-auto">

        <!--Card-->
        <div class="mx-4 mt-6 rounded bg-white p-8 shadow">

            <div class="mb-4 flex justify-start" x-data="{
                open: false,
                close() {
                    this.open = false;
                    setTimeout(function() {
                        $refs.dialogAdd.close();
                        document.body.style.overflow = null
                    }, 300)
                },
                ...ImagePreview('{{ asset('/img/placeholder.webp') }}'),
            }">
                <button
                    class="btn-add mr-0 inline-flex items-center gap-x-1 rounded-md bg-green-600 p-2 text-sm font-medium text-white hover:bg-green-700"
                    @click="$refs.dialogAdd.show();open=true;document.body.style.overflow='hidden'" type="button">
                    <svg class="bi bi-plus-lg h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                    <p>Add Data</p>
                </button>
                <dialog class="absolute z-50 h-screen w-screen bg-transparent" x-ref="dialogAdd" x-show="open" x-cloak
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div
                        class="fixed left-0 top-0 z-50 flex h-full w-full items-start justify-center overflow-y-auto overflow-x-hidden bg-gray-900 bg-opacity-50 transition-opacity duration-300 sm:p-7">
                        <div class="relative flex w-min bg-white sm:rounded-lg" @click.outside="close">
                            <form class="flex flex-col items-start" action="{{ route('admin.products.store') }}"
                                method="POST" onsubmit="onAdd(event)" x-ref="formAdd" @submit="close">
                                <div class="flex w-full items-center justify-between p-7">
                                    <div class="text-lg font-bold text-gray-900">Add product</div>
                                    <svg class="h-5 w-5 cursor-pointer fill-current text-gray-700" @click="close"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                        <path
                                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                    </svg>
                                </div>

                                <div class="px-7">
                                    <div class="flex flex-col gap-y-4">
                                        @csrf
                                        <input class="bg-gray-100 p-2 transition focus:ring-2 focus-visible:outline-none"
                                            type="text" placeholder="Product Name" name="name" required>

                                        <input class="bg-gray-100 p-2 transition focus:ring-2 focus-visible:outline-none"
                                            type="number" placeholder="Product Price (RP)" name="price" required>

                                        <label>
                                            Is Best Seller?
                                            <input
                                                class="bg-gray-100 p-2 transition focus:ring-2 focus-visible:outline-none"
                                                type="checkbox" name="is_best_seller">
                                        </label>

                                        <div>
                                            <label for="description">Description</label>
                                            <input id="description" name="description" type="hidden">
                                            <trix-editor input="description"></trix-editor>
                                        </div>

                                        <div>
                                            <label for="additional_information">Additional Information</label>
                                            <input id="additional_information" name="additional_information" type="hidden">
                                            <trix-editor input="additional_information"></trix-editor>
                                        </div>

                                        <select class="bg-gray-100 p-2 transition focus:ring-2 focus-visible:outline-none"
                                            name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        <div>
                                            <p>Image:</p>
                                            <label class="grid w-24">
                                                <input class="peer col-span-full row-span-full hidden" type="file"
                                                    name="image" x-on:change="previewImage(event)">

                                                <img class="col-span-full row-span-full w-full peer-invalid:aspect-square"
                                                    data-placeholder="{{ asset('/img/placeholder.webp') }}" loading="lazy"
                                                    x-ref="imgAdd" :src="src" />

                                                <div
                                                    class="col-span-full row-span-full grid cursor-pointer place-content-center bg-black bg-opacity-50 opacity-0 transition-opacity hover:opacity-100">
                                                    <svg class="col-span-full row-span-full h-5 w-5" class="bi bi-upload"
                                                        xmlns="http://www.w3.org/2000/svg" fill="white"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"
                                                            stroke-width="5" />
                                                        <path
                                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"
                                                            stroke-width="5" />
                                                    </svg>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex w-full items-center justify-between p-7">
                                    <button
                                        class="rounded border border-blue-500 bg-transparent py-2 px-4 font-semibold text-blue-700 hover:border-transparent hover:bg-gray-500 hover:text-white"
                                        type="button"
                                        @click="$refs.formAdd.reset();$refs.imgAdd.src = $refs.imgAdd.dataset.placeholder">
                                        Reset
                                    </button>
                                    <div>
                                        <button
                                            class="btn-add mr-3 rounded bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700"
                                            type="submit">
                                            Add
                                        </button>
                                        <button
                                            class="rounded border border-blue-500 bg-transparent py-2 px-4 font-semibold text-blue-700 hover:border-transparent hover:bg-gray-500 hover:text-white"
                                            type="button" @click="close">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </dialog>
            </div>

            <table class="stripe hover" id="products-table" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">Name</th>
                        <th data-priority="2">Best Seller</th>
                        <th data-orderable="false">Image</th>
                        <th data-priority="3">Description</th>
                        <th data-priority="4">Additional Information</th>
                        <th data-priority="5">Price</th>
                        <th data-priority="6">Category</th>
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
    <script src="/js/products.js"></script>
@endsection
