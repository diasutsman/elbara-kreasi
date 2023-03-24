<input class="h-12 w-12 text-center" type="checkbox" name="{{ $field }}" x-model="data.{{ $field }}"
    :disabled="!editMode" form="form-{{ $obj->slug }}">
