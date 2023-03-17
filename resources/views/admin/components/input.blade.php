<input type="{{ $type ?? 'text' }}" class="focus-visible:outline-none w-full bg-transparent"
    name="{{ $field }}" :disabled="!editMode" form="form-{{ $obj->slug }}" required :value="data.{{ $field }}">
