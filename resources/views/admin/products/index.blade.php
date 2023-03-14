@extends('admin.layouts.main')

@section('content')
    <!--Container-->
    <div class="w-full overflow-x-auto h-full">

        <!--Card-->
        <div class="p-8 mt-6 rounded shadow bg-white mx-4">

            <div class="flex justify-start mb-4" x-data="{ open: false }">
                <button @click="$refs.dialogAdd.showModal();open=true;document.body.style.overflow='hidden'"
                    class="btn-add inline-flex gap-x-1 items-center p-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md mr-0"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-lg h-5 w-5"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                    <p>Add Data</p>
                </button>
                <dialog x-ref="dialogAdd" x-transition x-show="open" class="bg-transparent z-0 relative w-screen h-screen"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div
                        class="p-7 flex justify-center items-start overflow-x-hidden overflow-y-auto fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300">
                        <div class="bg-white flex rounded-lg w-min relative"
                            @click.away="open = false;setTimeout(function(){ $refs.dialogAdd.close(); document.body.style.overflow = null }, 300)">
                            <form class="flex flex-col items-start" action="{{ route('admin.products.store') }}"
                                method="POST" onsubmit="onAdd(event)" x-ref="formAdd"
                                @submit="open = false;setTimeout(function(){ $refs.dialogAdd.close(); document.body.style.overflow = null }, 300)">
                                <div class="p-7 flex items-center w-full">
                                    <div class="text-gray-900 font-bold text-lg">Add product</div>
                                    <svg @click="open = false;setTimeout(function(){ $refs.dialogAdd.close();document.body.style.overflow = null }, 300)"
                                        class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                        <path
                                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                    </svg>
                                </div>

                                <div class="px-7">
                                    <div class="flex flex-col gap-y-4">
                                        @csrf
                                        <input type="text" placeholder="Product Name" name="name"
                                            class="bg-gray-100 p-2 focus-visible:outline-none focus:ring-2 transition"
                                            required>

                                        <input type="number" placeholder="Product Price (RP)" name="price"
                                            class="bg-gray-100 p-2 focus-visible:outline-none focus:ring-2 transition"
                                            required >

                                        <label>
                                            Is Best Seller?
                                            <input type="checkbox" name="is_best_seller"
                                                class="bg-gray-100 p-2 focus-visible:outline-none focus:ring-2 transition">
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

                                        <select name="category_id"
                                            class="bg-gray-100 p-2 focus-visible:outline-none focus:ring-2 transition">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        <div>
                                            <p>Image:</p>
                                            <label class="grid w-24">
                                                <input type="file" class="hidden row-span-full col-span-full peer"
                                                    onchange="previewImage(event)" name="image">

                                                <img loading="lazy" src="{{ asset('/img/placeholder.webp') }}"
                                                    data-placeholder="{{ asset('/img/placeholder.webp') }}"
                                                    class="row-span-full col-span-full w-full peer-invalid:aspect-square"
                                                    x-ref="imgAdd" />

                                                <div
                                                    class="bg-black cursor-pointer hover:opacity-100 transition-opacity opacity-0 bg-opacity-50 row-span-full col-span-full grid place-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 row-span-full col-span-full" fill="white"
                                                        class="bi bi-upload" viewBox="0 0 16 16">
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

                                <div class="p-7 flex justify-between items-center w-full">
                                    <button type="button"
                                        @click="$refs.formAdd.reset();$refs.imgAdd.src = $refs.imgAdd.dataset.placeholder"
                                        class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                        Reset
                                    </button>
                                    <div>
                                        <button type="submit"
                                            class="btn-add bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3">
                                            Add
                                        </button>
                                        <button type="button"
                                            @click="open = false;setTimeout(function(){ $refs.dialogAdd.close(); document.body.style.overflow = null }, 300)"
                                            class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </dialog>
            </div>


            <table id="products-table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
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
