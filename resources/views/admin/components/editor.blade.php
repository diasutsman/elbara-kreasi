<div x-data="{
    open: false,
    close() {
        this.open = false;
        setTimeout(function() {
            $refs['modal-{{ $obj->slug }}-{{ $field }}'].close();
            document.body.style.overflow = null
        }, 300)
    },
}">
    <p>
        <span class="value" x-text="data.{{ $field }}.simplified()"></span>
        <button x-bind:disabled="!editMode" class="enabled:text-blue-400 enabled:hover:text-blue-500"
            @click="$refs['modal-{{ $obj->slug }}-{{ $field }}'].showModal();open=true;document.body.style.overflow='hidden'">Edit</button>
    </p>

    <dialog x-ref="modal-{{ $obj->slug }}-{{ $field }}" class="bg-transparent z-0 relative w-screen h-screen"
        x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div
            class="p-7 flex justify-center items-start overflow-x-hidden overflow-y-auto fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300">
            <div class="bg-white flex rounded-lg w-min relative">
                <div class="flex flex-col items-start">
                    <div class="p-7 flex items-center w-full">
                        <div class="text-gray-900 font-bold text-lg">Edit {{ Str::headline($field) }} editor</div>
                        <svg @click="close()" class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>

                    <div class="px-7">
                        <form>
                            <input id="{{ $field }}-{{ $obj->slug }}"
                                x-ref="{{ $field }}_{{ $obj->slug }}" value="{{ $obj->$field }}"
                                name="{{ $field }}" type="hidden" form="form-{{ $obj->slug }}">
                            <trix-editor input="{{ $field }}-{{ $obj->slug }}" x-ref="{{ $field }}_{{ $obj->slug }}_editor"></trix-editor>
                        </form>
                    </div>

                    <div class="p-7 flex justify-end items-center w-full">
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3"
                            @click="data.{{ $field }} = $refs['{{ $field }}_{{ $obj->slug }}'].value;close()">
                            Ok
                        </button>
                        <button type="button" @click="close();$refs['{{ $field }}_{{ $obj->slug }}_editor'].editor.loadHTML(data.{{ $field }});"
                            class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </dialog>

</div>
