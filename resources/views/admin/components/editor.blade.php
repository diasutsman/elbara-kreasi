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
        <button class="enabled:text-blue-400 enabled:hover:text-blue-500" x-bind:disabled="!editMode"
            @click="$refs['modal-{{ $obj->slug }}-{{ $field }}'].showModal();open=true;document.body.style.overflow='hidden'">Edit</button>
    </p>

    <dialog class="relative z-0 h-screen w-screen bg-transparent" x-ref="modal-{{ $obj->slug }}-{{ $field }}"
        x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div
            class="fixed left-0 top-0 z-50 flex h-full w-full items-start justify-center overflow-y-auto overflow-x-hidden bg-gray-900 bg-opacity-50 p-7 transition-opacity duration-300">
            <div class="relative flex w-min rounded-lg bg-white">
                <div class="flex flex-col items-start">
                    <div class="flex w-full items-center p-7">
                        <div class="text-lg font-bold text-gray-900">Edit {{ Str::headline($field) }} editor</div>
                        <svg class="ml-auto h-5 w-5 cursor-pointer fill-current text-gray-700" @click="close()"
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
                            <trix-editor input="{{ $field }}-{{ $obj->slug }}"
                                x-ref="{{ $field }}_{{ $obj->slug }}_editor"></trix-editor>
                        </form>
                    </div>

                    <div class="flex w-full items-center justify-end p-7">
                        <button class="mr-3 rounded bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700"
                            type="button"
                            @click="data.{{ $field }} = $refs['{{ $field }}_{{ $obj->slug }}'].value;close()">
                            Ok
                        </button>
                        <button
                            class="rounded border border-blue-500 bg-transparent py-2 px-4 font-semibold text-blue-700 hover:border-transparent hover:bg-gray-500 hover:text-white"
                            type="button"
                            @click="close();$refs['{{ $field }}_{{ $obj->slug }}_editor'].editor.loadHTML(data.{{ $field }});">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </dialog>

</div>
