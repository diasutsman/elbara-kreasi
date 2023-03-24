<select name="{{ $field }}" x-bind:disabled="!editMode" form="form-{{ $obj->slug }}"
    x-model="data.{{ $field }}">
    @foreach ($options as $option)
        <option value="{{ $option->id }}">{{ $option->name }}</option>
    @endforeach
</select>
