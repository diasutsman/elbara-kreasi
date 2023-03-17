<div class="w-full flex justify-center gap-x-2">
    <div x-show="!editMode">
        <form action="{{ route($route, $obj->$field) }}" method="POST"
            x-on:submit.prevent="onDelete(event)" class="btn-delete">
            @method('DELETE')
            @csrf
            <button
                class="inline-flex items-center p-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md mr-0"
                type="submit" :class="isDeleting && 'bg-gray-800 hover:bg-gray-900'">
                <template x-if="isDeleting">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-arrow-clockwise h-5 w-5 animate-spin" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                        <path
                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                    </svg>
                </template>
                <template x-if="!isDeleting">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </template>
            </button>
        </form>
    </div>
    <button
        class="btn-edit inline-flex items-center p-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md mr-0"
        type="button" @click="onEdit(event)" x-show="!editMode">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-fill h-5 w-5"
            viewBox="0 0 16 16">
            <path
                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
        </svg>
    </button>

    <button
        class="btn-update inline-flex items-center p-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md mr-0"
        :class="isUpdating && 'bg-gray-800 hover:bg-gray-900'" type="submit" form="form-{{ $obj->slug }}" x-show="editMode" :disabled="isUpdating">
        <template x-if="!isUpdating">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check2 h-5 w-5"
                viewBox="0 0 16 16">
                <path
                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
            </svg>
        </template>
        <template x-if="isUpdating">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                class="bi bi-arrow-clockwise h-5 w-5 animate-spin" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                <path
                    d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
            </svg>
        </template>
    </button>


    <button
        class="btn-cancel inline-flex items-center p-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md mr-0"
        type="button" @click="onCancel(event)" x-show="editMode && !isUpdating">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg h-5 w-5" viewBox="0 0 16 16">
            <path
                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
    </button>

    @if (Request::is('admin/products*'))
        <a href="{{ route('products.show', $obj->slug) }}" target="_blank" title="View Product" x-show="!editMode"
            class="btn-view inline-flex items-center p-2 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-medium rounded-md mr-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye h-5 w-5" viewBox="0 0 16 16">
                <path
                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
        </a>
    @endif
</div>
