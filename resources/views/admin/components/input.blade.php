<input type="{{ $type ?? 'text' }}" value="{{ $obj->$field }}" class="focus-visible:outline-none w-full bg-transparent"
    name="{{ $field }}" disabled form="form-{{ $obj->slug }}" required>
