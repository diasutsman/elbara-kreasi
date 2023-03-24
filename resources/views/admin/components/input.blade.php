<input type="{{ $type ?? 'text' }}" class="w-full bg-transparent focus-visible:outline-none" name="{{ $field }}"
    :disabled="!editMode" form="form-{{ $obj->slug }}" required x-model="data.{{ $field }}"">
