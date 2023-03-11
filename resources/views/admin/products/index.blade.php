@extends('admin.layouts.main')

@section('content')
    <!--Container-->
    <div class="container w-full mx-auto px-2 overflow-x-auto h-full">

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 rounded shadow bg-white w-max">

            <form action="{{ route('admin.products.store') }}" method="POST" onsubmit="onAdd(event)"
                class="flex gap-x-2 justify-center mb-4 items-start">
                @csrf

                <input type="text" placeholder="Product Name" name="name"
                    class="bg-gray-100 p-2 focus-visible:outline-none focus:ring-2 transition" required>

                <label>
                    Is Best Seller?
                    <input type="checkbox" name="is_best_seller"
                    class="bg-gray-100 p-2 focus-visible:outline-none focus:ring-2 transition" required>
                </label>

                <label class="grid basis-16">
                    <input type="file" class="hidden row-span-full col-span-full peer" onchange="previewImage(event)"
                        name="image">

                    <img loading="lazy" src="{{ asset('/img/placeholder.webp') }}"
                        class="row-span-full col-span-full w-full peer-invalid:aspect-square" />

                    <div
                        class="bg-black cursor-pointer hover:opacity-100 transition-opacity opacity-0 bg-opacity-50 row-span-full col-span-full grid place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 row-span-full col-span-full" fill="white"
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

                <div>
                    <input type="text" class="value bg-gray-100 p-2 focus-visible:outline-none focus:ring-2 transition" placeholder="Description" readonly onclick="openModal('modal-product-add-description')">
                    
                    <dialog id="modal-product-add-description" class="bg-transparent z-0 relative w-screen h-screen">
                        <div
                            class="p-7 flex justify-center items-start overflow-x-hidden overflow-y-auto fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
                            <div class="bg-white flex rounded-lg w-min relative">
                                <div class="flex flex-col items-start">
                                    <div class="p-7 flex items-center w-full">
                                        <div class="text-gray-900 font-bold text-lg">Add description editor</div>
                                        <svg onclick="modalClose('modal-product-add-description')"
                                            class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                            <path
                                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                        </svg>
                                    </div>
                    
                                    <div class="px-7">
                                        {{-- <form> --}}
                                            <input id="description" name="description"
                                                type="hidden">
                                            <trix-editor input="description"></trix-editor>
                                        {{-- </form> --}}
                                    </div>
                    
                                    <div class="p-7 flex justify-end items-center w-full">
                                        <button type="button"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" onclick="okModal('modal-product-add-description')">
                                            Ok
                                        </button>
                                        <button type="button" onclick="modalClose('modal-product-add-description')"
                                            class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </dialog>
                    
                </div>

                <div>
                    <input type="text" class="value bg-gray-100 p-2 focus-visible:outline-none focus:ring-2 transition" placeholder="Additional Information" readonly onclick="openModal('modal-product-add-additional-information')">
                    
                    <dialog id="modal-product-add-additional-information" class="bg-transparent z-0 relative w-screen h-screen">
                        <div
                            class="p-7 flex justify-center items-start overflow-x-hidden overflow-y-auto fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
                            <div class="bg-white flex rounded-lg w-min relative">
                                <div class="flex flex-col items-start">
                                    <div class="p-7 flex items-center w-full">
                                        <div class="text-gray-900 font-bold text-lg">Add additional information editor</div>
                                        <svg onclick="modalClose('mymodaltop')"
                                            class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                            <path
                                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                        </svg>
                                    </div>
                    
                                    <div class="px-7">
                                        {{-- <form> --}}
                                            <input id="additional_information" name="additional_information"
                                                type="hidden">
                                            <trix-editor input="additional_information"></trix-editor>
                                        {{-- </form> --}}
                                    </div>
                    
                                    <div class="p-7 flex justify-end items-center w-full">
                                        <button type="button"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" onclick="okModal('modal-product-add-additional-information')">
                                            Ok
                                        </button>
                                        <button type="button" onclick="modalClose('modal-product-add-additional-information')"
                                            class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </dialog>
                    
                </div>

                <select name="category_id" class="bg-gray-100 p-2 focus-visible:outline-none focus:ring-2 transition">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <button
                    class="btn-add inline-flex gap-x-1 items-center p-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md mr-0"
                    type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-lg h-5 w-5"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                    <p>Add Data</p>
                </button>
            </form>


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
