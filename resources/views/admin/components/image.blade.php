<label class="grid w-min min-w-[100px]" x-data="{
    previewImage(image) {
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = (oFREvent) => {
            data.{{ $field }} = oFREvent.target.result;
        };
    }
}">
    <input class="peer col-span-full row-span-full hidden" type="file" @change="previewImage($el)" name="image"
        form="form-{{ $obj->slug }}" :disabled="!editMode">
    <img class="col-span-full row-span-full" loading="lazy"
        :src="data.{{ $field }} ?? '{{ asset('img/placeholder.webp') }}'" />
    <div
        class="col-span-full row-span-full grid place-content-center bg-black bg-opacity-50 opacity-0 transition-opacity peer-enabled:cursor-pointer peer-enabled:hover:opacity-100">
        <svg class="col-span-full row-span-full h-5 w-5" class="bi bi-upload" xmlns="http://www.w3.org/2000/svg"
            fill="white" viewBox="0 0 16 16">
            <path
                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"
                stroke-width="5" />
            <path
                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"
                stroke-width="5" />
        </svg>
    </div>
</label>
