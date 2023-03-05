<label class="grid group cursor-pointer">
    <img loading="lazy"
        src="@if ($obj->$field) {{ asset('storage/' . $obj->$field) }} @else https://picsum.photos/200/300 @endif"
        class="row-span-full col-span-full w-full" />

    {{-- <input type="hidden" name="oldImage" value="{{ $obj->$field }}" class="row-span-full col-span-full"> --}}
    <input type="file" class="hidden row-span-full col-span-full" onchange="previewImage(event)" name="image" form="form-{{ $obj->slug }}">
    <div
        class="bg-black group-hover:opacity-100 transition-opacity opacity-0 bg-opacity-50 row-span-full col-span-full grid place-content-center">
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
