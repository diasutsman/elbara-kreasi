@extends('admin.layouts.main')

@section('content')
    <!--Container-->
    <div class="w-full overflow-x-auto h-full">

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 rounded shadow bg-white mx-4">

            <div class="flex justify-start mb-4" x-data="{ open: false }">
                <button @click="$refs.dialogAdd.showModal();open=true;"
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
                        <div class="bg-white flex rounded-lg w-min relative">
                            <form class="flex flex-col items-start" action="{{ route('admin.products.store') }}"
                                method="POST" onsubmit="onAdd(event)" x-ref="formAdd" 
                                @submit="open = false;setTimeout(function(){ $refs.dialogAdd.close();$refs.formAdd.reset() }, 300)">
                                <div class="p-7 flex items-center w-full">
                                    <div class="text-gray-900 font-bold text-lg">Add product</div>
                                    <svg @click="open = false;setTimeout(function(){ $refs.dialogAdd.close() }, 300)"
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
                                    </div>
                                </div>

                                <div class="p-7 flex justify-end items-center w-full">
                                    <button type="submit"
                                        class="btn-add bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3">
                                        Add
                                    </button>
                                    <button type="button"
                                        @click="open = false;setTimeout(function(){ $refs.dialogAdd.close() }, 300)"
                                        class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                        Close
                                    </button>
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
                        <th data-priority="5">Category</th>
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
