<div>
    <p>
        <span class="value" x-text="data.{{ $field }}.simplified()"></span>
        <button x-bind:disabled="!editMode" onclick="openModal('modal-{{ $obj->slug }}-{{ $field }}')" class="enabled:text-blue-400 enabled:hover:text-blue-500">Edit</button>
    </p>
    
    <dialog id="modal-{{ $obj->slug }}-{{ $field }}" class="bg-transparent z-0 relative w-screen h-screen">
        <div
            class="p-7 flex justify-center items-start overflow-x-hidden overflow-y-auto fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
            <div class="bg-white flex rounded-lg w-min relative">
                <div class="flex flex-col items-start">
                    <div class="p-7 flex items-center w-full">
                        <div class="text-gray-900 font-bold text-lg">Edit {{ Str::headline(($field)) }} editor</div>
                        <svg onclick="modalClose('modal-{{ $obj->slug }}-{{ $field }}')"
                            class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>
    
                    <div class="px-7">
                        <form>
                            <input id="{{ $field }}-{{ $obj->slug }}" x-ref="{{ $field }}_{{ $obj->slug }}" value="{{ $obj->$field }}" name="{{ $field }}"
                                type="hidden" form="form-{{ $obj->slug }}">
                            <trix-editor input="{{ $field }}-{{ $obj->slug }}"></trix-editor>
                        </form>
                    </div>
    
                    <div class="p-7 flex justify-end items-center w-full">
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" @click="data.{{ $field }} = $refs['{{ $field }}_{{ $obj->slug }}'].value" onclick="modalClose('modal-{{ $obj->slug }}-{{ $field }}')">
                            Ok
                        </button>
                        <button type="button" onclick="modalClose('modal-{{ $obj->slug }}-{{ $field }}')"
                            class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
    
</div>