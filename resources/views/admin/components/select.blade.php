<select name="{{ $field }}" x-bind:disabled="!editMode" form="form-{{ $obj->slug }}">
    @foreach ($options as $option)
        <option value="{{ $option->id }}" @selected($option->id === $obj->$field)>{{ $option->name }}</option>
    @endforeach
</select>